<?php

namespace UMSdk;

use Illuminate\Contracts\Config\Repository;
use UMSdk\Android\AndroidBroadcast;
use UMSdk\Android\AndroidUnicast;
use UMSdk\Config\AndroidPushBody;

class UMPushAndroid
{
    protected $appkey = NULL;
    protected $appMasterSecret = NULL;
    protected $timestamp = NULL;
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->appkey = $config->get("push.android_app_key");
        $this->appMasterSecret = $config->get("push.android_app_secret");
        $this->timestamp = strval(time());
    }

    /**
     * 安卓广播
     * @param AndroidPushBody $body
     */
    function sendAndroidBroadcast(AndroidPushBody $body)
    {
        try {
            $brocast = new AndroidBroadcast();
            $brocast->setAppMasterSecret($this->appMasterSecret);
            $brocast->setPredefinedKeyValue("appkey", $this->appkey);
            $brocast->setPredefinedKeyValue("timestamp", $this->timestamp);
            $brocast->setPredefinedKeyValue("ticker", $body->getTicker());
            $brocast->setPredefinedKeyValue("title", $body->getTitle());
            $brocast->setPredefinedKeyValue("text", $body->getText());
            $brocast->setPredefinedKeyValue("after_open", $body->getAfterOpen());
            // Set 'production_mode' to 'false' if it's a test device.
            // For how to register a test device, please see the developer doc.
            $brocast->setPredefinedKeyValue("production_mode", $body->getProductionMode());
            // [optional]Set extra fields
            foreach ($body->getCustomizedField() as $key => $value) {
                $brocast->setExtraField($key, $value);
            }
            print("Sending broadcast notification, please wait...\r\n");
            $brocast->send();
            print("Sent SUCCESS\r\n");
        } catch (\Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }

    /**
     * 安卓单播
     * @param AndroidPushBody $body
     */
    function sendAndroidUnicast(AndroidPushBody $body)
    {
        try {
            $unicast = new AndroidUnicast();
            $unicast->setAppMasterSecret($this->appMasterSecret);
            $unicast->setPredefinedKeyValue("appkey", $this->appkey);
            $unicast->setPredefinedKeyValue("timestamp", $this->timestamp);
            // Set your device tokens here
            $unicast->setPredefinedKeyValue("device_tokens", $body->getDeviceTokens());
            $unicast->setPredefinedKeyValue("ticker", $body->getTicker());
            $unicast->setPredefinedKeyValue("title", $body->getTitle());
            $unicast->setPredefinedKeyValue("text", $body->getText());
            $unicast->setPredefinedKeyValue("after_open", $body->getAfterOpen());
            // Set 'production_mode' to 'false' if it's a test device.
            // For how to register a test device, please see the developer doc.
            $unicast->setPredefinedKeyValue("production_mode", $body->getProductionMode());
            // Set extra fields
            foreach ($body->getCustomizedField() as $key => $value) {
                $unicast->setExtraField($key, $value);
            }
            print("Sending unicast notification, please wait...\r\n");
            $unicast->send();
            print("Sent SUCCESS\r\n");
        } catch (\Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }
}