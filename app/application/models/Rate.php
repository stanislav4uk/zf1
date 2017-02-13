<?php

/**
 * Class Application_Model_Rate
 */
class Application_Model_Rate
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $currency;

    /**
     * @var float
     */
    protected $rate;

    /**
     * @var string
     */
    protected $base;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     * @return $this
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @param string $base
     * @return $this
     */
    public function setBase($base)
    {
        $this->base = $base;

        return $this;
    }
}
