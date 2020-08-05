<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class UpdatePostMetaJob
{

    const VENDOR_ID = 56;

    public function __construct()
    {
        $this->db = new DB();
        $this->vendor = new Vendor();
    }

    protected function set()
    {
        $this->metaParam = "price";
        $this->metaValue = "value = 'MAYO' or value = 'LIBERTY'";
    }

    protected function createMOCfromVOC($voc)
    {
        $MARZA = 26.7;
        $VOC = $voc;
        $PRIRAZKA = (100 * $MARZA) / (100 - $MARZA);
        $MOC = $VOC + ($PRIRAZKA / 100) * $VOC;
        return ceil($MOC / 10) * 10 - 1;
    }

    public function run()
    {
        $this->set();
        $query = "SELECT * FROM dnt_posts_meta WHERE vendor_id = '" . self::VENDOR_ID . "' AND `key` = '" . $this->metaParam . "' AND post_id IN(SELECT post_id FROM dnt_posts_meta WHERE " . $this->metaValue . ") GROUP BY post_id";
        if ($this->db->num_rows($query) > 0) {
            $i = 1;
            foreach ($this->db->get_results($query) as $row) {
                $param = $row['value'];
                $paramUpdated = $this->createMOCfromVOC($param);
                $updateQuery = "UPDATE `dnt_posts_meta` SET value='" . $paramUpdated . "' WHERE `key` = '" . $this->metaParam . "' AND id_entity = '" . $row['id_entity'] . "' AND vendor_id = '" . self::VENDOR_ID . "'";
                $this->db->query($updateQuery);
                echo $i . ' - ' . $param . " - " . $paramUpdated . "<br/>";
                $i++;
            }
        }
    }

}
