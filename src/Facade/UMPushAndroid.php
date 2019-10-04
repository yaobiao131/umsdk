<?php


namespace UMSdk\Facade;


use Illuminate\Support\Facades\Facade;
use UMSdk\Config\AndroidPushBody;

/**
 * @method void sendAndroidBroadcast(AndroidPushBody $body)
 * @method void sendAndroidUnicast(AndroidPushBody $body)
 * Class UMPushAndroid
 * @package UMSdk\Facade
 */
class UMPushAndroid extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "push.android";
    }
}