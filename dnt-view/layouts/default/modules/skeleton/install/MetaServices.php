<?php

namespace DntView\Layout\Modul\Install;

use DntLibrary\Base\Vendor;

class MetaServices
{

    protected $content = 'Content';

    public function init($postId, $service)
    {
        $defaultContent = $this->content;
        $insertedData[] = array(
            '`post_id`' => $postId,
            '`service`' => $service,
            '`vendor_id`' => Vendor::getId(),
            '`key`' => "test_meta",
            '`value`' => $defaultContent,
            '`content_type`' => "text",
            '`cat_id`' => "2",
            '`description`' => "Test Meta",
            '`order`' => "100",
            '`show`' => "1",
        );
        return $insertedData;
    }

}
