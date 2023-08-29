<?php

namespace DntAdmin\Moduls;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;
use function get_bottom;
use function get_top;
use function str_split;

class Invoices
{
    protected $db;

    protected $rest;

    public function __construct()
    {
        $this->db = new DB();
        $this->rest = new Rest();
        $this->dnt = new Dnt();
        $this->vendor = new Vendor();
    }

    public function numToText($cislo)
    {
        $cislo = strtr($cislo, ',', '.');
        if ($cislo == '00') {
            $cislo = 0;
        }
        $spojka = '';
        $pomlcka = '';
        $oddelovac = '';
        $zaporne = 'mínus ';
        $desatinne = ' , ';
        $cislovky = array(
            0 => 'nula',
            1 => 'jeden',
            2 => 'dva',
            3 => 'tri',
            4 => 'štyri',
            5 => 'päť',
            6 => 'šesť',
            7 => 'sedem',
            8 => 'osem',
            9 => 'deväť',
            10 => 'desať',
            11 => 'jedenásť',
            12 => 'dvanásť',
            13 => 'trinásť',
            14 => 'štrnásť',
            15 => 'pätnásť',
            16 => 'šestnásť',
            17 => 'sedemnásť',
            18 => 'osemnásť',
            19 => 'devätnásť',
            20 => 'dvadsať',
            30 => 'tridsať',
            40 => 'štyridsať',
            50 => 'päťdesiat',
            60 => 'šesťdesiat',
            70 => 'sedemdesiat',
            80 => 'osemdesiat',
            90 => 'deväťdesiat',
            100 => 'sto',
            1000 => 'tisíc',
            1000000 => 'milión',
            1000000000 => 'miliarda',
            1000000000000 => 'trilión',
            1000000000000000 => 'quadrilión',
            1000000000000000000 => 'quintilión',
        );

        if (!is_numeric($cislo)) {
            return false;
        }

        if (($cislo >= 0 && (int) $cislo < 0) || (int) $cislo < 0 - PHP_INT_MAX) {
            // overflow
            trigger_error(
                '$this->numToText akceptuje iba čísla medzi -' . PHP_INT_MAX . ' a ' . PHP_INT_MAX,
                E_USER_WARNING
            );
            return false;
        }

        if ($cislo < 0) {
            return $zaporne . $this->numToText(abs($cislo));
        }

        $retazec = $zlomok = null;

        if (strpos($cislo, '.') !== false) {
            list($cislo, $zlomok) = explode('.', $cislo);
        }

        switch (true) {
            case $cislo < 21:
                $retazec = $cislovky[$cislo];
                break;
            case $cislo < 100:
                $desiatky = ((int) ($cislo / 10)) * 10;
                $jednotky = $cislo % 10;
                $retazec = $cislovky[$desiatky];
                if ($jednotky) {
                    $retazec .= $pomlcka . $cislovky[$jednotky];
                }
                break;
            case $cislo > 100 && $cislo < 200:
                $zvysok = $cislo % 100;
                $retazec = $cislovky[100];
                if ($zvysok) {
                    $retazec .= $spojka . $this->numToText($zvysok);
                }
                break;
            case $cislo < 1000:
                $stovky = $cislo / 100;
                $zvysok = $cislo % 100;
                $retazec = $cislovky[$stovky] . '' . $cislovky[100];
                if ($zvysok) {
                    $retazec .= $spojka . $this->numToText($zvysok);
                }
                break;
            case $cislo == 2000:
                $retazec .= 'dvetisíc';
                break;
            default:
                $zakladna_jednotka = pow(1000, floor(log($cislo, 1000)));
                $numericka_zakladna_jednotka = (int) ($cislo / $zakladna_jednotka);
                $zvysok = $cislo % $zakladna_jednotka;
                $retazec = $this->numToText($numericka_zakladna_jednotka) . '' . $cislovky[$zakladna_jednotka];
                if ($zvysok) {
                    $retazec .= $zvysok < 100 ? $spojka : $oddelovac;
                    $retazec .= $this->numToText($zvysok);
                }
                break;
        }

        if (null !== $zlomok && is_numeric($zlomok)) {
            $retazec .= $desatinne;
            $slova = array();
            foreach (str_split((string) $zlomok) as $cislo) {
                $slova[] = $cislovky[$cislo];
            }
            $retazec .= implode(' ', $slova);
        }

        return $retazec;
    }

    public function getAll()
    {
        $data = [];
        $query = "SELECT * FROM dnt_orders WHERE vendor_id = '" . $this->vendor->getId() . "'";
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query);
        }
        return $data;
    }

    public function findById($id)
    {
        $data = [];
        $query = "SELECT * FROM dnt_orders WHERE vendor_id = '" . $this->vendor->getId() . "' AND id_entity = '" . $id . "'";
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query)[0];
        }
        return $data;
    }

    public function updateCountInCart($produktId, $count, $orderId)
    {
        $current = 0;
        $query = 'SELECT product_id, count FROM dnt_basket WHERE '
                . "vendor_id = '" . $this->vendor->getId() . "' AND "
                . "order_id_entity = '" . $orderId . "' AND "
                . "product_id = '" . $produktId . "'";
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query);
            $current = $data[0]['count'];
            if ($current == 0) {
                $current = 1;
            }
        }
        $newCount = $current + $count;
        $this->db->update(
            'dnt_basket',
            [
                    'count' => $newCount,
                ],
            [
                    'product_id' => $produktId,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
    }

    public function insertToCart($produktId, $count, $orderId)
    {
        $insert = [
            'vendor_id' => $this->vendor->getId(),
            'user_id' => 1,
            'product_id' => $produktId,
            'order_id_entity' => $orderId,
            'count' => $count,
            'datetime_creat' => $this->dnt->datetime(),
            'parent_id' => 0,
        ];
        $this->db->insert('dnt_basket', $insert);
    }

    public function addToCart($ids, $orderProducts, $orderId, $count)
    {
        $productsToCart = explode(',', $ids);

        $productsInCartIds = [];
        foreach ($orderProducts as $product) {
            $productsInCartIds[$product['id_entity']] = $product['id_entity'];
        }

        foreach ($productsToCart as $produktId) {
            if (in_array($produktId, $productsInCartIds)) {
                $this->updateCountInCart($produktId, $count, $orderId);
            } else {
                $this->insertToCart($produktId, $count, $orderId);
            }
        }
    }

    public function orderSum($orderProducts)
    {
        $orderSum = 0;
        foreach ($orderProducts as $item) {
            $count = $item['count'] == 0 ? 1 : $item['count'];
            $orderSum += $item['price'] * $count;
        }
        return $orderSum;
    }

    public function getOrderProductsById($products, $orderId)
    {
        $data = [];
        $final = [];
        $basketProducts = [];
        $basketProductData = [];
        $return = [];
        $query = "SELECT product_id, count, order_id_entity FROM dnt_basket WHERE vendor_id = '" . $this->vendor->getId() . "' AND order_id_entity = '" . $orderId . "'";
        if ($this->db->num_rows($query) > 0) {
            $data = $this->db->get_results($query);
            foreach ($data as $item) {
                $basketProducts[] = $item['product_id'];
                $basketProductData[$item['product_id']] = $item;
            }

            foreach ($products as $produkt) {
                if (in_array($produkt['id_entity'], $basketProducts)) {
                    $final[] = $produkt;
                }
            }
        }

        /** add info in basket * */
        foreach ($final as $finalItem) {
            $return[] = array_merge($basketProductData[$finalItem['id_entity']], $finalItem);
        }
        return $return;
    }

    /**
     *
     * get all products with post_meta_data
     */
    public function getProducts()
    {
        $response = [];
        $rawMeta = [];
        $metaData = [];

        $query = "SELECT * FROM dnt_posts WHERE `vendor_id` = '" . $this->vendor->getId() . "' AND type = 'product'";
        if ($this->db->num_rows($query) > 0) {
            $dataProducts = $this->db->get_results($query);

            $idsArr = [];
            foreach ($dataProducts as $id) {
                $idsArr[] = $id['id_entity'];
            }
            $ids = join(',', $idsArr);

            $query2 = "SELECT * FROM dnt_posts_meta WHERE `vendor_id` = '" . $this->vendor->getId() . "' AND post_id IN (" . $ids . ')';

            if ($this->db->num_rows($query2) > 0) {
                $rawMeta = $this->db->get_results($query2);
                foreach ($rawMeta as $val) {
                    $metaData[$val['post_id']][$val['key']] = $val['value'];
                }
            }

            $response = [];
            foreach ($dataProducts as $product) {
                $response[] = isset($metaData[$product['id_entity']]) ? (array_merge($product, $metaData[$product['id_entity']])) : false;
            }
        }
        return $response;
    }

    public function orderStatus($current = false)
    {
        $staus = [
            'Objednávka nie je potvrdená',
            'Pripravená na spracovanie',
            'Objednávka sa spracúva',
            'Objednávka je vybavená',
            'Objednávka je anulovaná',
        ];

        if ($current || $current === 0) {
            return $staus[$current];
        }
        return $staus;
    }

    public function orderTransportation($current = false)
    {
        $staus = [
            'Bezplatná doprava - 0 €',
            'Slovenská pošta, zásielky do 500g - 1.95 €',
            'Slovenská pošta - 3.95 €',
            'Kuriér GLS - 7 €',
        ];

        if ($current || $current === 0) {
            return $staus[$current];
        }
        return $staus;
    }

    public function update($id)
    {
        $datetimePublish = $this->dnt->timeToDbFormat('.', $this->rest->post('datetime_publish'));
        $this->db->update(
            'dnt_orders',
            [
                    'order_id' => $this->rest->post('order_id'),
                    'name' => $this->rest->post('name'),
                    'surname' => $this->rest->post('surname'),
                    'street' => $this->rest->post('street'),
                    'gate_number' => $this->rest->post('gate_number'),
                    'country' => $this->rest->post('country'),
                    'city' => $this->rest->post('city'),
                    'phone_number' => $this->rest->post('phone_number'),
                    'psc' => $this->rest->post('psc'),
                    'email' => $this->rest->post('email'),
                    'amount' => $this->rest->post('amount'),
                    'payment_type' => $this->rest->post('payment_type'),
                    'transportation' => $this->rest->post('transportation'),
                    'is_paid' => $this->rest->post('is_paid'),
                    'from_account' => $this->rest->post('from_account'),
                    'from_cash' => $this->rest->post('from_cash'),
                    'percentage_discount' => $this->rest->post('percentage_discount'),
                    'search' => $this->rest->post('search'),
                    'content' => $this->rest->post('content'),
                    'company_name' => $this->rest->post('company_name'),
                    'company_street' => $this->rest->post('company_street'),
                    'company_gate_number' => $this->rest->post('company_gate_number'),
                    'company_city' => $this->rest->post('company_city'),
                    'company_country' => $this->rest->post('company_country'),
                    'company_psc' => $this->rest->post('company_psc'),
                    'company_email' => $this->rest->post('company_email'),
                    'company_phone_number' => $this->rest->post('company_phone_number'),
                    'ico' => $this->rest->post('ico'),
                    'dic' => $this->rest->post('dic'),
                    'status' => $this->rest->post('status'),
                    'is_seen' => $this->rest->post('is_seen'),
                    'show' => $this->rest->post('show'),
                    'datetime_update' => $this->dnt->datetime(),
                    'datetime_publish' => $datetimePublish,
                ],
            [
                    'id_entity' => $id,
                    '`vendor_id`' => $this->vendor->getId(),
                ]
        );
    }

    protected function parseInvoice($html)
    {
        $begin = explode('<!--INVOICE-BEGIN-->', $html);
        $invoice = explode('<!--INVOICE-END-->', $begin[1]);
        return $invoice[0];
    }

    public function renderableInvoiceHtml($html)
    {
        ob_start();
        get_top();
        echo '<style>.no-print{display:none;}html,body{background: #fff;}.grid{box-shadow: initial;}</style>';
        echo $this->parseInvoice($html);
        get_bottom();
        $response = ob_get_clean();
        $response = preg_replace('@<!-- BEGIN CONTROL -->[^>]*?>.*?<!-- END CONTROL -->@si', '', $response);
        $response = preg_replace('@<script[^>]*?>.*?</script>@si', '', $response);
        $response = str_replace(WWW_PATH, 'https://query.sk/', $response);
        return $response;
    }
}
