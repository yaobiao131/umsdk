<?php

namespace UMSdk\tests;

use PHPUnit\Framework\TestCase;

class IosTest extends TestCase
{

    protected $demo;
    protected function setUp()
    {
        $this->demo = new Demo("xx", "xx");
    }

    public function testIOSBroadcast()
    {
        $this->demo->sendIOSUnicast("xx");
//        $this->demo->sendIOSBroadcast();
    }
}