<?php

namespace UMSdk;

use Illuminate\Contracts\Config\Repository;
use UMSdk\Config\IosPushBody;
use UMSdk\Ios\IOSBroadcast;
use UMSdk\Ios\IOSFilecast;
use UMSdk\Ios\IOSUnicast;

class UMPushIOS
{
    protected $appkey = NULL;
    protected $appMasterSecret = NULL;
    protected $timestamp = NULL;
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
        $this->appkey = $config->get("push.ios_app_key");
        $this->appMasterSecret = $config->get("push.ios_app_secret");
        $this->timestamp = strval(time());
    }

    /**
     * 发送ios单播
     * @param IosPushBody $body
     */
    public function sendIOSUnicast(IosPushBody $body): void
    {
        try {
            $unicast = new IOSUnicast();
            $unicast->setAppMasterSecret($this->appMasterSecret);
            $unicast->setPredefinedKeyValue("appkey", $this->appkey);
            $unicast->setPredefinedKeyValue("timestamp", $this->timestamp);
            // Set your device tokens here
            $unicast->setPredefinedKeyValue("device_tokens", $body->getDeviceTokens());
            $unicast->setPredefinedKeyValue("alert", $body->getAlert());
            $unicast->setPredefinedKeyValue("badge", $body->getBadge());
            $unicast->setPredefinedKeyValue("sound", $body->getSound());
            // Set 'production_mode' to 'true' if your app is under production mode
            $unicast->setPredefinedKeyValue("production_mode", $body->getProductionMode());
            // Set customized fields
            foreach ($body->getCustomizedField() as $key => $value) {
                $unicast->setCustomizedField($key, $value);
            }

            print("Sending unicast notification, please wait...\r\n");
            $unicast->send();
            print("Sent SUCCESS\r\n");
        } catch (\Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }

    /**
     * ios广播消息
     * @param IosPushBody $body
     */
    function sendIOSBroadcast(IosPushBody $body): void
    {
        try {
            $brocast = new IOSBroadcast();
            $brocast->setAppMasterSecret($this->appMasterSecret);
            $brocast->setPredefinedKeyValue("appkey", $this->appkey);
            $brocast->setPredefinedKeyValue("timestamp", $this->timestamp);

            $brocast->setPredefinedKeyValue("alert", $body->getAlert());
            $brocast->setPredefinedKeyValue("badge", $body->getBadge());
            $brocast->setPredefinedKeyValue("sound", $body->getSound());
            // Set 'production_mode' to 'true' if your app is under production mode
            $brocast->setPredefinedKeyValue("production_mode", $body->getProductionMode());
            // Set customized fields
            foreach ($body->getCustomizedField() as $key => $value) {
                $brocast->setCustomizedField($key, $value);
            }
            print("Sending broadcast notification, please wait...\r\n");
            $brocast->send();
            print("Sent SUCCESS\r\n");
        } catch (\Exception $e) {
            print("Caught exception: " . $e->getMessage());
        }
    }

    /**
     * 发送ios文件播
     * todo
     */
    function sendIOSFilecast()
    {

    }
}