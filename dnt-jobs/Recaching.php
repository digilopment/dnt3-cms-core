<?php

namespace DntJobs;

use DntLibrary\Base\Dnt;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Vendor;

class RecachingJob
{

    public function __construct()
    {
        $this->vendor = new Vendor();
        $this->rest = new Rest();
        $this->dnt = new Dnt();
    }

    protected function setVendor()
    {
        $this->vendorId = ($this->rest->get('vendorId') > 0) ? $this->rest->get('vendorId') : $this->vendor->getId();
    }

    protected function removePluginsCache()
    {
        $files = glob('../dnt-cache/plugins/*.{generated}', GLOB_BRACE);
        $final = [];
        if ($this->vendorId) {
            foreach ($files as $file) {
                $vendorFile = '-' . $this->vendorId . '-';
                if (file_exists($file) && $this->dnt->in_string($vendorFile, $this->dnt->name_url($file))) {
                    $final[] = $file;
                }
            }
        } else {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    $final[] = $file;
                }
            }
        }
        foreach ($final as $finalFile) {
            if (file_exists($finalFile)) {
                unlink($finalFile);
            }
        }
    }

    protected function initGetRequest($url)
    {
        $json = file_get_contents($url);
        $this->response = json_decode($json);
    }

    protected function getVendor()
    {
        $final = [];
        if ($this->vendorId) {
            foreach ($this->vendor->getAll() as $vendor) {
                if ($this->vendorId == $vendor['id']) {
                    $final[] = $vendor;
                }
            }
        } else {
            foreach ($this->vendor->getAll() as $vendor) {
                $final[] = $vendor;
            }
        }
        $this->vendors = $final;
    }

    public function init()
    {
        $this->setVendor();
        $this->getVendor();
        $this->removePluginsCache();
    }

    public function run()
    {
        $this->init();
        $finalUrl = [];
        foreach ($this->vendors as $vendor) {
            $url = HTTP_PROTOCOL . $vendor['name_url'] . '.' . DOMAIN . '/dnt-jobs/prepare-cache-by-url?json=1';
            $this->initGetRequest($url);
            foreach ($this->response['urls'] as $url) {
                echo $url . '<br/>';
            }
        }
    }

}
