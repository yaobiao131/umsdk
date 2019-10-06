<?php

namespace UMSdk\Ios;

use UMSdk\IOSNotification;


class IOSUnicast extends IOSNotification
{
    function __construct()
    {
        parent::__construct();
        $this->data["type"] = "unicast";
        $this->data["device_tokens"] = NULL;
    }

}