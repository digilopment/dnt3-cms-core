<?php

namespace DntJobs;

use DntAdmin\Moduls\ImportContent;
use DntLibrary\App\Autoloader;

class ImportProductsJob
{

    protected $importContent;

    public function __construct()
    {
        (new Autoloader())->addClass('../dnt-admin/modules/content/content', 'ImportContent');
        $this->importContent = new ImportContent();
    }

    public function run()
    {

        foreach (json_decode(file_get_contents('http://bike4you.digilopment.com/import/filterJson.php')) as $item) {

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
                'vendor_id' => '56',
                'content' => $item->description . '<!--params-->' . $params,
                'perex' => $item->categorytext . ' ' . $item->category . ' ' . $item->name,
                'service' => 'product_detail',
                'type' => 'product',
                'show' => '1',
                'cat_id' => '308', //zatriedenie do eshop product
                'image' => $item->image
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
            //var_dump($postData, $metaData);
        }
        //$this->importContent->createPost($postData, $metaData);
    }

}
