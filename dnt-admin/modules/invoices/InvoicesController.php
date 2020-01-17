<?php

class InvoicesController extends AdminController
{

    protected $loc = __FILE__;
    protected $invoices;
    protected $createTable;
    protected $createOrder;
    protected $rest;
    protected $dnt;

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
    }

    public function addAction()
    {
        $this->createOrder->new();
    }

    public function editAction()
    {
        $id = $this->rest->get('id_entity');
        $data['order'] = $this->invoices->findById($id);
        $data['orderStatus'] = $this->invoices->orderStatus();
        $data['orderTransportation'] = $this->invoices->orderTransportation();
        $data['products'] = $this->invoices->getProducts();
        $data['orderProducts'] = $this->invoices->getOrderProductsById($data['products'], $this->rest->get('id_entity'));

        $orderSum = 0;
        foreach ($data['orderProducts'] as $item) {
            $count = $item['count'] == 0 ? 1 : $item['count'];
            $orderSum += $item['price'] * $count;
        }
        $data['orderSum'] = $orderSum;
        $data['toBePaid'] = $orderSum - ($data['order']['from_cash'] + $data['order']['from_account']);
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

        $arr = explode('.', $data['order']['amount']);
        $eur = $cent = 0;
        if (isset($arr[0])) {
            $eur = $arr[0];
        }
        if (isset($arr[1])) {
            $cent = $arr[1];
        }

        $data['sumText'] = $this->invoices->numToText($eur) . ' eur, ' . $this->invoices->numToText($cent) . ' centov';
        $this->loadTemplate($this->loc, 'print', $data);
    }

    public function indexAction()
    {
        $this->createTable->ifNotExists('dnt_orders');
        $this->createTable->ifNotExists('dnt_basket');
        $data['orders'] = $this->invoices->getAll();
        $this->loadTemplate($this->loc, 'default', $data);
    }

}
