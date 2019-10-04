<?php


namespace UMSdk\Config;


class AndroidPushBody
{
    private $deviceTokens;
    private $ticker = "安卓ticker";
    private $title = "安卓title";
    private $text = "安卓text";
    private $afterOpen = "after open";
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
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * @param string $ticker
     */
    public function setTicker(string $ticker): void
    {
        $this->ticker = $ticker;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getAfterOpen(): string
    {
        return $this->afterOpen;
    }

    /**
     * @param string $afterOpen
     */
    public function setAfterOpen(string $afterOpen): void
    {
        $this->afterOpen = $afterOpen;
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