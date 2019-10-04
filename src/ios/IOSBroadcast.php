<?php

namespace umsdk\ios;

use umsdk\IOSNotification;

//require_once(dirname(__FILE__) . '/../IOSNotification.php');

class IOSBroadcast extends IOSNotification
{
    function __construct()
    {
        parent::__construct();
        $this->data["type"] = "broadcast";
    }
}