<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class UpdateParamFromImportJob
{

    const VENDOR_ID = 56;
    const IMPORT_SERVICE = 'schindler';

    protected $metaParam;
    protected $service;

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
        $this->rest = new Rest();
        $this->dnt = new Dnt();
    }

    protected function importServices()
    {
        return [
            'schindler' => 'http://bike4you.digilopment.com/import/schindler/importJson.php',
            'benefitcz' => 'http://bike4you.digilopment.com/import/benefitcz/importJson.php',
            'kross' => 'http://bike4you.digilopment.com/import/kross/importJson.php',
        ];
    }

    protected function set()
    {
        $this->metaParam = $this->rest->get('metaParam');
        $this->service = $this->rest->get('service');
    }

    protected function updateMeta($value, $id_entity, $post_id)
    {
        if ($this->metaParam == 'isInStock') {
            $inStock = ($value > 0) ? 1 : 0;
            //var_dump($inStock . ' - ' . $value);
            $updateQuery = "UPDATE `dnt_posts_meta` SET `value` = '" . $value . "', `show` = '" . $inStock . "' WHERE "
                    . "`key` = '" . $this->metaParam . "' AND "
                    . "`id_entity` = '" . $id_entity . "' AND "
                    . "`post_id` = '" . $post_id . "' AND "
                    . "`vendor_id` = '" . self::VENDOR_ID . "'";
        } else {
            $updateQuery = "UPDATE `dnt_posts_meta` SET `value` = '" . $value . "' WHERE "
                    . "`key` = '" . $this->metaParam . "' AND "
                    . "`id_entity` = '" . $id_entity . "' AND "
                    . "`post_id` = '" . $post_id . "' AND "
                    . "`vendor_id` = '" . self::VENDOR_ID . "'";
        }
		
        $this->db->query($updateQuery);
    }

    protected function insertMeta($value, $post_id)
    {
        $show = 1;
        if ($this->metaParam == 'isInStock') {
            $show = ($value > 0) ? 1 : 0;
        }
        $insertedData = array(
            '`post_id`' => $post_id,
            '`service`' => 'product_detail',
            '`vendor_id`' => self::VENDOR_ID,
            '`key`' => $this->metaParam,
            '`value`' => $value,
            '`content_type`' => 'text',
            '`cat_id`' => '2',
            '`description`' => 'Meta param ' . $this->metaParam,
            '`order`' => '300',
            '`show`' => $show,
        );
		
        if ($this->dnt->in_string('price', $this->metaParam) || $this->dnt->in_string('variants', $this->metaParam)) {
            //DO NOTHING - NO UPDATE no-exist key
        } else {
			echo 'INSERT<br/>';
            $this->db->insert('dnt_posts_meta', $insertedData);
        }
    }

    protected function availableParams()
    {
        return[
            'price' => 'price', //UPDATE ONLY EXISTS META, NO INSERT NEW META
            'isInStock' => 'in_stock', //UPDATE ALL PARAMS IF NO EXISTS, CREATE NEW META
            'year' => 'year',
            'catalogue_price' => 'catalogue_price', //UPDATE ONLY EXISTS META, NO INSERT NEW META
            'purchase_price' => 'purchase_price', //UPDATE ONLY EXISTS META, NO INSERT NEW META
            'variants' => 'variants', //UPDATE ONLY EXISTS META, NO INSERT NEW META
            'variant' => 'variant',
            'originalImage' => 'image'
        ];
    }

    protected function setAvailability()
    {
        $query = "SELECT * FROM dnt_posts "
                . "WHERE `vendor_id` = '" . self::VENDOR_ID . "' "
                . "AND id_entity IN(SELECT post_id FROM dnt_posts_meta WHERE `vendor_id` = '" . self::VENDOR_ID . "' AND `key` = 'isInStock' AND `value` > 0) "
                . "GROUP BY group_id "
                . "ORDER BY `id` DESC";

        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $meta) {
                $updateQuery = "UPDATE `dnt_posts_meta` SET `show` = '1' WHERE "
                        . "`key` = 'isInStock' AND "
                        . "`post_id` = '" . $meta['id_entity'] . "' AND "
                        . "`vendor_id` = '" . self::VENDOR_ID . "'";
                $this->db->update($updateQuery);
            }
        }
    }

    public function run()
    {
        $this->set();
        if (in_array($this->metaParam, array_keys($this->availableParams()))) {
            $importService = $this->importServices();
            if ($this->service && in_array($this->service, array_keys($this->importServices()))) {
                $importService = [];
                $url = $this->importServices();
                $importService[$this->service] = $url[$this->service];
            }
            $part1 = [];
            $part2 = [];
            foreach ($importService as $service) {
                foreach (json_decode(file_get_contents($service), true) as $variants) {
                    $key = $variants['manufacturer'] . '-' . $variants['id'];
                    $part1[$key] = $variants;
                    //var_dump($variants);
                    foreach (json_decode($this->dnt->hexToStr($variants['variants']), true) as $item) {
                        $key = $item['manufacturer'] . '-' . $item['id'];
                        $part2[$key] = $item;
						//var_dump($item);
                        //$part2['variants'] = $item['variants'];
                    }
                }
            }
			$items = [];
            $items = array_merge($part2, $part1);
			/*var_dump($part1);
			var_dump(count($part1));
			var_dump(count($part2));
			exit;*/
            $param = $this->availableParams();
            $metaParam = $this->metaParam;
            $jsonParam = $param[$this->metaParam];
            $i = 0;

			//var_dump($items);
			
            foreach ($items as $item) {
                //if ($item['id'] == '500088_1_2') {
                if (isset($item['id'])) {
                    $query = "SELECT * FROM dnt_posts_meta WHERE `key` = 'productId' AND `value` = '" . $item['id'] . "' ORDER BY id ASC";
                    //echo $query . "<br/><br/>";
                    $value = $item[$jsonParam];
					if(is_array($value)){
						$value = $value[0];
					}
                    //var_dump($item['price']);
                    if ($this->db->num_rows($query) > 0) {
                        foreach ($this->db->get_results($query) as $meta) {
                            $postId = $meta['post_id'];
                            $query = "SELECT * FROM dnt_posts_meta "
                                    . "WHERE `vendor_id` = '" . self::VENDOR_ID . "' "
                                    . "AND `key` = '" . $metaParam . "' "
                                    . "AND `post_id` = '" . $postId . "'";
                            //echo $query . "<br/><br/>";
                            if ($this->db->num_rows($query) > 0) {
                                foreach ($this->db->get_results($query) as $updateMeta) {
									print($item['id'] . 'UPDATE<br/>');
                                    $this->updateMeta($value, $updateMeta['id_entity'], $updateMeta['post_id']);
                                }
                            } else {
								print($item['id'] . 'INSERT<br/>');
                                $this->insertMeta($value, $postId);
                            }
                        }
                    }else{
						echo $item['id'] . ' no data<br/>';
					}
                }else{
					
				}
                $i++;
                //}
            }
            /* if ($this->metaParam == 'isInStock') {
              print('UPDATED MAIN PRODUCT AVAILABILITY<br/>');
              $this->setAvailability();
              } */
            print('OK dok');
        } else {
            echo 'Prosím zvoľte parameter na update<br/><br/>';
            foreach ($this->availableParams() as $key => $val) {
                echo $val . "<br/>";
            }
        }
    }

}
