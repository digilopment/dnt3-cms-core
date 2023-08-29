<?php

namespace DntAdmin\Moduls;

use DntLibrary\Base\DB;

class CreateTable
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB();
    }

    public function ifNotExists($tableName)
    {
        $file = __DIR__ . '/sql/' . $tableName . '.sql';
        $query = file_get_contents($file);
        if (!$this->db->table_exists($tableName)) {
            $this->db->query($query);
            $this->db->query("ALTER TABLE `$tableName` ADD PRIMARY KEY (`id`)");
            $this->db->query("ALTER TABLE `$tableName` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");
        }
    }

}
