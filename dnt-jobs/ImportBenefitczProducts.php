<?php

namespace DntJobs;

use DntAdmin\Moduls\ImportContent;
use DntLibrary\App\Autoloader;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;

class ImportBenefitczProductsJob
{

    protected $importContent;

    const VENDOR_ID = 56;
    const CAT_ID = 308;
    const IMPORT_SERVICE = 'http://bike4you.digilopment.com/import/benefitcz/importJson.php';

    public function __construct()
    {
        (new Autoloader())->addClass('../dnt-admin/modules/content/content', 'ImportContent');
        $this->importContent = new ImportContent();
        $this->dnt = new Dnt();
        $this->image = new Image();
        $this->db = new DB();
    }

    protected function deleteProducts()
    {
        $query = "SELECT * FROM `dnt_posts` WHERE `vendor_id` = '" . self::VENDOR_ID . "' AND type = 'product'";
        if ($this->db->num_rows($query) > 0) {
            foreach ($this->db->get_results($query) as $row) {
                $post_id = $row['id_entity'];
                $wherePosts = array('id_entity' => $post_id, 'vendor_id' => self::VENDOR_ID);
                $this->db->delete('dnt_posts', $wherePosts);

                $whereMeta = array('post_id' => $post_id, 'vendor_id' => self::VENDOR_ID);
                $this->db->delete('dnt_posts_meta', $whereMeta);

                //REMOVE IMAGE
                $imageId = $row['img'];
                $imageName = $this->image->getFileImage($imageId, false);
                $fileName = "../dnt-view/data/uploads/" . $imageName;
                if ($imageName) {
                    $this->dnt->deleteFile($fileName);
                }

                //DELETE FROM DB
                $this->db->query("DELETE FROM dnt_uploads WHERE name = '" . $imageName . "' AND vendor_id = '" . self::VENDOR_ID . "'");
            }
        }
    }

    public function comp($compare, $item, $object)
    {
        //if ($this->dnt->name_url($compare) == $this->dnt->name_url($item->$object)) {
        if ((string) $compare == (string) $item->$object) {
            return true;
        }
        return false;
    }

    public function compPa($item, $paramName, $paramValue)
    {
        $i = 0;
        if (isset($item->params)) {
            foreach ($item->params as $param) {
                if ($this->dnt->name_url($param->name->{0}) == $this->dnt->name_url($paramName)) {
                    if ($this->dnt->name_url($param->val->{0}) == $this->dnt->name_url($paramValue)) {
                        return true;
                    }
                }
                $i++;
            }
        }
        return false;
    }

    protected function importLiberty($item)
    {
        if ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | City Design', $item, 'categorytext')) {
            return 157;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | Skladacie 20"', $item, 'categorytext')) {
            return 117;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | City 20"', $item, 'categorytext')) {
            return 113;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | City 24"', $item, 'categorytext')) {
            return 114;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | City 26"', $item, 'categorytext')) {
            return 115;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('LIBERTY | City 28"', $item, 'categorytext')) {
            return 116;
        }
        //ELECTROBIKE
        elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-Skladacie', $item, 'categorytext')) {
            return 159;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-COMFY', $item, 'categorytext')) {
            return 160;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-STRADA', $item, 'categorytext')) {
            return 161;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-VIA', $item, 'categorytext')) {
            return 162;
        } elseif ($this->comp('LIBERTY', $item, 'manufacturer') && $this->comp('Elektro-bickle | Novinky', $item, 'categorytext')) {
            return 163;
        }
    }

    protected function importMayo($item)
    {
        if ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | Dětské 12"/16"/20"', $item, 'categorytext')) {
            return 124;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | MTB 24"', $item, 'categorytext')) {
            return 124;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | XC 29" eR', $item, 'categorytext')) {
            return 121;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | XC 27,5"', $item, 'categorytext')) {
            return 122;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('AKCIA', $item, 'categorytext')) {
            return 170;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | MTB 26"', $item, 'categorytext')) {
            return 123;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | Cross 28"', $item, 'categorytext')) {
            return 125;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('MAYO | Trekking 28"', $item, 'categorytext')) {
            return 126;
        }
        //ELECTROBIKE
        elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-POWER', $item, 'categorytext')) {
            return 165;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-BASIC', $item, 'categorytext')) {
            return 166;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-STEPS', $item, 'categorytext')) {
            return 167;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('Elektro-bickle | E-TOUR', $item, 'categorytext')) {
            return 168;
        } elseif ($this->comp('MAYO', $item, 'manufacturer') && $this->comp('Elektro-bickle | Novinky', $item, 'categorytext')) {
            return 169;
        }
    }

    public function setFinalCat($item)
    {

        echo $item->name . "<br/>";

        if ($this->comp('LIBERTY', $item, 'manufacturer')) {
            return $this->importLiberty($item);
        } elseif ($this->comp('MAYO', $item, 'manufacturer')) {
            return $this->importMayo($item);
        }
    }

    protected function import()
    {
        $i = 0;
        foreach (json_decode(file_get_contents(self::IMPORT_SERVICE)) as $item) {
            $params = false;
            if (isset($item->params)) {
                $params = '<div class="params"><table>';
                foreach ($item->params as $param) {
                    $params .= '<tr><td class="key">' . $param->name->{0} . '</td><td class="value">' . $param->val->{0} . '</td></tr>';
                }
                $params .= '</table></div>';
            }

            $postData = [
                'name' => $item->name,
                'vendor_id' => self::VENDOR_ID,
                'content' => $item->description . '<!--params-->' . $params,
                'perex' => $item->categorytext . ' ' . $item->category . ' ' . $item->name,
                'service' => 'product_detail',
                'type' => 'product',
                'show' => '1',
                'cat_id' => self::CAT_ID, //zatriedenie do eshop product
                'image' => $item->image,
                'post_category_id' => $this->setFinalCat($item),
            ];

            $metaData = [
                'price' => $item->price,
                'catalogue_price' => $item->catalogue_price,
                'purchase_price' => $item->purchase_price,
                'variant' => isset($item->variant->{0}) ? $item->variant->{0} : '',
                'dataSource' => 'benefitCZ',
                //'code' => $item->code,
                'variants' => $item->variants,
                'productId' => $item->id,
                'groupId' => $item->group,
                'manufacturer' => $item->manufacturer,
                //'year' => $item->year,
                'originalImage' => $item->image,
            ];
            //var_dump($metaData);
            $this->importContent->createPost($postData, $metaData);
        }
    }

    public function run()
    {
        //$this->deleteProducts();
        $this->import();
    }

}
