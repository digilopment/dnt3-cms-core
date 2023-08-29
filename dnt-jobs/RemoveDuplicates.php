<?php

namespace DntJobs;

use DntLibrary\Base\DB;
use DntLibrary\Base\Vendor;

class RemoveDuplicatesJob
{
    public function run()
    {
        $vendor = new Vendor();
        $db = new DB();

        $query = 'SELECT *, COUNT(email) FROM dnt_mailer_mails WHERE vendor_id = 39 AND `cat_id` = 55 GROUP BY email HAVING COUNT(email) > 1 ORDER BY name asc LIMIT 10000';

        if ($db->num_rows($query) > 0) {
            foreach ($db->get_results($query) as $row) {
                $ids[] = $row['id'] . '<br/>';
            }
        }

        foreach ($ids as $id) {
            $where = array('id' => $id);
            $db->delete('dnt_mailer_mails', $where);
        }
    }
}
