<?php

namespace DntJobs;

use DntAdmin\Moduls\ImportContent;
use DntLibrary\App\Autoloader;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;

class ImportKrossProductsJob
{

    protected $importContent;

    const VENDOR_ID = 56;
    const CAT_ID = 308;
    const IMPORT_SERVICE = 'http://bike4you.digilopment.com/import/kross/importJson.php';

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
        $query = "SELECT * FROM `dnt_posts` WHERE `vendor_id` = '" . self::VENDOR_ID . "' AND type = 'product' AND `content` LIKE '%-<!--params-->%'";
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
                if($imageName){
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

    protected function importKross($item)
    {
        if ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > EBIKE TREKKING', $item, 'categorytext')) {
            return 176;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > JUNIOR', $item, 'categorytext')) {
            return 184;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > ROAD', $item, 'categorytext')) {
            return 188;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB WOMAN', $item, 'categorytext')) {
            return 185;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > KIDS', $item, 'categorytext')) {
            return 184;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > TREKKING', $item, 'categorytext')) {
            return 182;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > TRAIL', $item, 'categorytext')) {
            return 191;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > ENDURO', $item, 'categorytext')) {
            return 192;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB XC', $item, 'categorytext')) {
            return 173;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > CROSS', $item, 'categorytext')) {
            return 182;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB', $item, 'categorytext')) {
            return 174;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB XC FULL', $item, 'categorytext')) {
            return 193;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > GRAVEL', $item, 'categorytext')) {
            return 181;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > CYCLOCROSS', $item, 'categorytext')) {
            return 194;
        }
        //DAMSKE
        elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB XC FEMI LINE', $item, 'categorytext')) {
            return 185;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > MTB WOMAN', $item, 'categorytext')) {
            return 196;
        }elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > ROAD FEMI LINE', $item, 'categorytext')) {
            return 188;
        }
        //ELEKTRO
        elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > EBIKE MTB', $item, 'categorytext')) {
            return 178;
        } elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > EBIKE TRAIL', $item, 'categorytext')) {
            return 179;
        }elseif ($this->comp('KROSS', $item, 'manufacturer') && $this->comp('Bikes > EBIKE TREKKING', $item, 'categorytext')) {
            return 176;
        }
    }

    public function setFinalCat($item)
    {

        echo $item->name . "<br/>";

        if ($this->comp('KROSS', $item, 'manufacturer')) {
            return $this->importKross($item);
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
                    $params .= '<tr><td class="key">' . $param->name . '</td><td class="value">' . $param->val. '</td></tr>';
                }
                $params .= '</table></div>';
            }

            //$item->image = false;
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

            //$item->price = '';
            //$item->catalogue_price = '';
            //$item->purchase_price = '';
            $metaData = [
                'price' => $item->price,
                'catalogue_price' => $item->catalogue_price,
                'purchase_price' => $item->purchase_price,
                'variant' => $item->variant,
                'dataSource' => 'kross',
                //'code' => $item->code,
                'variants' => $item->variants,
                'productId' => $item->id,
                'groupId' => $item->group,
                'manufacturer' => $item->manufacturer,
                //'year' => $item->year,
                'originalImage' => $item->image,
            ];
            $this->importContent->createPost($postData, $metaData);
        }
    }

    public function run()
    {
        $this->deleteProducts();
        $this->import();
    }

}
