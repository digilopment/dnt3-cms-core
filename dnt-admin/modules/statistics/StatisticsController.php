<?php

namespace DntAdmin\Moduls;

use DntAdmin\App\AdminController;
use DntLibrary\Base\DntLog;

class StatisticsController extends AdminController
{

    protected $loc = __FILE__;
    protected $log;

    public function __construct()
    {
        $this->log = new DntLog();
    }

    public function indexAction()
    {
        $agentUniq = $this->log->getCountOs("GROUP BY REMOTE_ADDR");
        if (isset($agentUniq['os'])) {
            $osArrUniq = $agentUniq['os'];
            $browserArrUniq = $agentUniq['browser'];
            $agent = $this->log->getCountOs(false);
            $osArr = $agent['os'];
            $browserArr = $agent['browser'];
        } else {
            $osArrUniq = array();
            $browserArrUniq = array();
            $osArr = array();
            $browserArr = array();
        }

        $andWhere = "AND `HTTP_COOKIE` <> 'IS_JOB=1'";
        $data = [
            'andWhere' => $andWhere,
            'allAccess' => $this->log->getAllAccess($andWhere),
            'uniqueAccess' => $this->log->getUniqueAccess($andWhere),
            'osx' => $this->log->getCountOs($andWhere),
            'uniqueUsers' => $this->log->getUniqueUsers(false),
            'allUsers' => $this->log->getallUsers(false),
            'osArrUniq' => $osArrUniq,
            'browserArrUniq' => $browserArrUniq,
            'osArr' => $osArr,
            'browserArr' => $browserArr,
        ];
        $this->loadTemplate($this->loc, 'default', $data);
    }

}
