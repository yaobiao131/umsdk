<?php

namespace UMSdk\Android;

use UMSdk\AndroidNotification;


class AndroidListcast extends AndroidNotification
{
    function __construct()
    {
        parent::__construct();
        $this->data["type"] = "listcast";
        $this->data["device_tokens"] = NULL;
    }

}