<?php

namespace DntAdmin\Moduls;

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class CreateOrder
{

    protected $db;
    protected $dnt;
    protected $rest;
    protected $data;
    protected $tableName = 'dnt_orders';

    public function __construct($data = false)
    {
        $this->db = new DB();
        $this->dnt = new Dnt();
        $this->rest = new Rest();
        $this->vendor = new Vendor();
        $this->data = $data;
    }

    public function newOrder()
    {

        $insert = [
            'vendor_id' => $this->vendor->getId(),
            'user_id' => 1,
            'datetime_creat' => $this->dnt->datetime(),
            'datetime_update' => $this->dnt->datetime(),
            '`show`' => '0'
        ];
        $this->db->dbTransaction();
        $this->db->insert($this->tableName, $insert);
        $this->db->dbcommit();
        $lastId = $this->dnt->getLastId($this->tableName);
        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices&action=edit&id_entity=' . $lastId;
        $this->dnt->redirect($redirect);
    }

    public function del()
    {

        $id = $this->rest->get('id_entity');

        $where1 = ['id_entity' => $id, 'vendor_id' => $this->vendor->getId()];
        $this->db->delete('dnt_orders', $where1);

        $where2 = ['order_id_entity' => $id, 'vendor_id' => $this->vendor->getId()];
        $this->db->delete('dnt_basket', $where2);

        $redirect = WWW_PATH_ADMIN_2 . 'index.php?src=invoices';
        $this->dnt->redirect($redirect);
    }

}
