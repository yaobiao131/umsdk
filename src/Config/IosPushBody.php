<?php


namespace UMSdk\Config;


class IosPushBody
{
    private $deviceTokens;
    private $alert = "ios测试";
    private $badge = "0";
    private $sound = "chime";
    private $productionMode = "false";
    private $customizedField = ["" => ""];

    /**
     * @param string $deviceTokens
     */
    public function setDeviceToken(string $deviceTokens)
    {
        $this->deviceTokens = $deviceTokens;
    }

    /**
     * @return mixed
     */
    public function getDeviceTokens()
    {
        return $this->deviceTokens;
    }

    /**
     * @return mixed
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * @param string $alert
     */
    public function setAlert(string $alert): void
    {
        $this->alert = $alert;
    }

    /**
     * @return mixed
     */
    public function getBadge()
    {
        return $this->badge;
    }

    /**
     * @param int $badge
     */
    public function setBadge(int $badge): void
    {
        $this->badge = $badge;
    }

    /**
     * @return mixed
     */
    public function getSound()
    {
        return $this->sound;
    }

    /**
     * @param mixed $sound
     */
    public function setSound($sound): void
    {
        $this->sound = $sound;
    }

    /**
     * @return mixed
     */
    public function getProductionMode()
    {
        return $this->productionMode;
    }

    /**
     * @param mixed $productionMode
     */
    public function setProductionMode($productionMode): void
    {
        $this->productionMode = $productionMode;
    }

    /**
     * @return array
     */
    public function getCustomizedField(): array
    {
        return $this->customizedField;
    }

    /**
     * @param array $customizedField
     */
    public function setCustomizedField(array $customizedField): void
    {
        $this->customizedField = $customizedField;
    }



}