<?php

namespace DntJobs;

use DntAdmin\Moduls\ImportContent;
use DntLibrary\App\Autoloader;
use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Image;

class ImportSchindlerProductsJob
{

    protected $importContent;

    const VENDOR_ID = 56;
    const CAT_ID = 308;
    const IMPORT_SERVICE = 'http://bike4you.digilopment.com/import/schindler/importJson.php';

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

    protected function importGhost($item)
    {
        //GHOST 98,99 101, 103, 104, 105, 107, 108, 109
        if ($this->compPa($item, 'Pohlaví', 'Dámské')) {
            if ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 107;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 107;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('GRAVEL / CYKLOCROSS', $item, 'categorytext')) {
                return 108;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('CITY', $item, 'categorytext')) {
                return 108;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('CROSS / TREKKING', $item, 'categorytext')) {
                return 108;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('DĚTSKÁ / KIDS', $item, 'categorytext')) {
                return 109;
            }
            //ELECTROBIKE
            elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 103;
            } elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 104;
            } elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('CROSS / TREKKING', $item, 'categorytext')) {
                return 101;
            }
        } else {
            if ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('DĚTSKÁ / KIDS', $item, 'categorytext')) {
                return 109;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('GRAVEL / CYKLOCROSS', $item, 'categorytext')) {
                return 105;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('CITY', $item, 'categorytext')) {
                return 105;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('CROSS / TREKKING', $item, 'categorytext')) {
                return 105;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 98;
            } elseif ($this->comp('GHOST', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 99;
            }
            //ELECTROBIKE
            elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 103;
            } elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 104;
            } elseif ($this->comp('GHOST E-Bikes', $item, 'manufacturer') && $this->comp('CROSS / TREKKING', $item, 'categorytext')) {
                return 101;
            }
        }
    }

    protected function importLapierre($item)
    {
        if ($this->compPa($item, 'Kategorie', 'CITY / CROSS / TREKKING')) {
            return 148;
        } elseif ($this->compPa($item, 'Pohlaví', 'Dámské')) {
            if ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 144;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 144;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('SILNIČNÍ / ROAD BIKES', $item, 'categorytext')) {
                return 145;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('DĚTSKÁ / KIDS', $item, 'categorytext')) {
                return 146;
            }
            //ELECTROBIKE
            elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 140;
            } elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 141;
            } elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('SILNIČNÍ / ROAD BIKES', $item, 'categorytext')) {
                return 138;
            }
        } else {
            if ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 134;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 135;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('SILNIČNÍ / ROAD BIKES', $item, 'categorytext')) {
                return 142;
            } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') && $this->comp('DĚTSKÁ / KIDS', $item, 'categorytext')) {
                return 146;
            } elseif ($item->code == 'D8200000' || $item->code == 'D8210000') {
                return 146;
            }
            //ELECTROBIKE
            elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('MTB FULLY', $item, 'categorytext')) {
                return 140;
            } elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('MTB HARDTAIL', $item, 'categorytext')) {
                return 141;
            } elseif ($this->comp('LAPIERRE E-Bikes', $item, 'manufacturer') && $this->comp('SILNIČNÍ / ROAD BIKES', $item, 'categorytext')) {
                return 138;
            }
        }
    }

    protected function importElectra($item)
    {
        if ($this->comp('ELECTRA', $item, 'manufacturer') && $this->comp('DĚTSKÁ / KIDS', $item, 'categorytext')) {
            return 155;
        } elseif ($this->comp('ELECTRA', $item, 'manufacturer')) {
            return 150;
        } elseif ($this->comp('ELECTRA E-Bikes', $item, 'manufacturer')) {
            return 156;
        }
    }

    public function setFinalCat($item)
    {

        echo $item->name . "<br/>";

        if ($this->comp('GHOST', $item, 'manufacturer') || $this->comp('GHOST E-Bikes', $item, 'manufacturer')) {
            return $this->importGhost($item);
        } elseif ($this->comp('LAPIERRE', $item, 'manufacturer') || $this->comp('LAPIERRE E-Bikes', $item, 'manufacturer')) {
            return $this->importLapierre($item);
        } elseif ($this->comp('ELECTRA', $item, 'manufacturer') || $this->comp('ELECTRA E-Bikes', $item, 'manufacturer')) {
            return $this->importElectra($item);
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
                'variant' => $item->variant,
                'dataSource' => 'schindler',
                'code' => $item->code,
                'variants' => $item->variants,
                'productId' => $item->id,
                'groupId' => $item->group,
                'manufacturer' => $item->manufacturer,
                'year' => $item->year,
                'originalImage' => $item->image,
            ];
            $this->importContent->createPost($postData, $metaData);
        }
    }

    public function run()
    {
        //$this->deleteProducts();
        $this->import();
    }

}
