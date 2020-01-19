<?php

class InvoicesController extends AdminController
{

    protected $loc = __FILE__;
    protected $invoices;
    protected $createTable;
    protected $createOrder;
    protected $rest;
    protected $dnt;
    protected $settings;
    protected $image;
    protected $invoicePath;
    protected $pdf;

    public function __construct()
    {
        (new Autoloader())->addClass($this->loc, 'Invoices');
        $this->invoices = new Invoices();
        (new Autoloader())->addClass($this->loc, 'CreateTable');
        $this->createTable = new CreateTable();
        (new Autoloader())->addClass($this->loc, 'CreateOrder');
        $this->createOrder = new CreateOrder();
        $this->rest = new Rest();
        $this->dnt = new Dnt();
        $this->db = new DB();
        $this->settings = new Settings();
        $this->image = new Image();
        $this->invoicePath = 'dnt-view/data/invoices/';
        $this->pdf = new Pdf();
    }

    public function addAction()
    {
        $this->createOrder->new();
    }

    public function delAction()
    {
        $id = $this->rest->get('id_entity');

        $where1 = ['id_entity' => $id, 'vendor_id' => Vendor::getId()];
        $this->db->delete('dnt_orders', $where1);

        $where2 = ['order_id_entity' => $id, 'vendor_id' => Vendor::getId()];
        $this->db->delete('dnt_basket', $where2);

        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices';
        $this->dnt->redirect($redirect);
    }

    public function delProductAction()
    {
        $id = $this->rest->get('product_id');
        $orderId = $this->rest->get('order_id');

        $where = ['order_id_entity' => $orderId, 'vendor_id' => Vendor::getId(), 'product_id' => $id];
        $this->db->delete('dnt_basket', $where);

        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices&action=edit&id_entity=' . $orderId;
        $this->dnt->redirect($redirect);
    }

    public function editAction()
    {
        $id = $this->rest->get('id_entity');
        $data['order'] = $this->invoices->findById($id);
        $data['orderStatus'] = $this->invoices->orderStatus();
        $data['orderTransportation'] = $this->invoices->orderTransportation();
        $data['products'] = $this->invoices->getProducts();
        $data['orderProducts'] = $this->invoices->getOrderProductsById($data['products'], $this->rest->get('id_entity'));
        $data['orderSum'] = $this->invoices->orderSum($data['orderProducts']);
        $data['toBePaid'] = $data['orderSum'] - ($data['order']['from_cash'] + $data['order']['from_account']);
        $this->loadTemplate($this->loc, 'edit', $data);
    }

    public function addToCartAction()
    {
        $productId = $this->rest->get('id_entity');
        $orderId = $this->rest->get('order_id');
        $count = $this->rest->get('count');
        $data['order'] = $this->invoices->findById($orderId);
        $data['products'] = $this->invoices->getProducts();
        $data['orderProducts'] = $this->invoices->getOrderProductsById($data['products'], $this->rest->get('order_id'));
        $this->invoices->addToCart($productId, $data['orderProducts'], $this->rest->get('order_id'), $count);
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices&action=edit&id_entity=' . $this->rest->get('order_id');
        $this->dnt->redirect($redirect);
    }

    public function updateAction()
    {
        if ($this->hasPost('sent')) {
            $id = $this->rest->get('id_entity');
            $this->invoices->update($id);

            if (!empty($this->rest->post('gallery_key_products'))) {
                $data['products'] = $this->invoices->getProducts();
                $data['orderProducts'] = $this->invoices->getOrderProductsById($data['products'], $this->rest->get('id_entity'));
                $this->invoices->addToCart($this->rest->post('gallery_key_products'), $data['orderProducts'], $this->rest->get('id_entity'), 1);
            }

            $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices&action=edit&id_entity=' . $id;
            $this->dnt->redirect($redirect);
        }
    }

    public function printAction()
    {
        $id = $this->rest->get('id_entity');
        $data['order'] = $this->invoices->findById($id);
        $data['products'] = $this->invoices->getProducts();
        $data['orderProducts'] = $this->invoices->getOrderProductsById($data['products'], $this->rest->get('id_entity'));
        $orderSum = $this->invoices->orderSum($data['orderProducts']);
        $settings = $this->settings->getAllSettings();

        $orderSum = number_format($orderSum, 2, '.', ',');
        $arr = explode('.', $orderSum);
        $eur = $cent = 0;
        if (isset($arr[0])) {
            $eur = $arr[0];
        }
        if (isset($arr[1])) {
            $cent = $arr[1];
        }
        $data['orderSumText'] = $this->invoices->numToText($eur) . ' eur, ' . $this->invoices->numToText($cent) . ' centov';
        $data['orderSum'] = $orderSum;

        $data['vendor'] = function ($key) use ($settings) {
            return $settings['keys'][$key]['value'];
        };

        $data['image'] = function ($id) {
            return $this->image->getFileImage($id);
        };

        /** DISCOUNT * */
        $data['discountSum'] = number_format($data['orderSum'] / 100 * ( $data['order']['percentage_discount']), 2, '.', ',');
        $data['finalDiscountSum'] = number_format($data['orderSum'] - $data['discountSum'], 2, '.', ',');
        $arr = explode('.', $data['finalDiscountSum']);
        $eur = $cent = 0;
        if (isset($arr[0])) {
            $eur = $arr[0];
        }
        if (isset($arr[1])) {
            $cent = $arr[1];
        }
        $data['pdf_file'] = '../' . $this->invoicePath . Vendor::getId() . '_' . $data['order']['order_id'] . '.pdf';
        $data['finalDiscountSumText'] = $this->invoices->numToText($eur) . ' eur, ' . $this->invoices->numToText($cent) . ' centov';

        ob_start();
        $this->loadTemplate($this->loc, 'print', $data);
        $html = ob_get_clean();

        $invoiceResponseAsUrl = $this->invoices->renderableInvoiceHtml($html);
        $data['invoiceHtml'] = $invoiceResponseAsUrl;
        $this->loadTemplate($this->loc, 'print', $data);
    }

    public function generateAction()
    {
        if ($this->hasPost('invoiceHtml')) {

            $path = $this->invoicePath;
            $invoiceName = Vendor::getId() . '_' . $this->rest->post('order_id') . '.pdf';
            $html = $this->rest->post('invoiceHtml');
            $this->pdf->prepareHtmlToRender($path, $invoiceName, $html);
            $this->dnt->redirect(WWW_PATH . $path . $invoiceName);
        } else {
            $this->dnt->redirect(WWW_PATH_ADMIN_2 . 'index.php?src=invoices');
        }
    }

    public function indexAction()
    {
        $this->createTable->ifNotExists('dnt_orders');
        $this->createTable->ifNotExists('dnt_basket');
        $data['defaultOrders'] = $this->invoices->getAll();
        $data['products'] = $this->invoices->getProducts();

        $orders = [];
        $extendedData = [];
        foreach ($data['defaultOrders'] as $order) {
            $orderProducts = $this->invoices->getOrderProductsById($data['products'], $order['id_entity']);
            $orderSum = $this->invoices->orderSum($orderProducts);
            $extendedData = [
                'orderSum' => $orderSum,
                'paid' => $order['from_account'] + $order['from_cash'],
                'needToPay' => $orderSum - ($order['from_account'] + $order['from_cash']),
            ];
            $orders[] = array_merge($extendedData, $order);
        }
        $data['orders'] = $orders;
        $this->loadTemplate($this->loc, 'default', $data);
    }

}
