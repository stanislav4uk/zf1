<?php
namespace App\Extensions\ExchangeRatesFetcher\Values;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Class Rate
 * @package App\Extensions\ExchangeRatesFetcher\Values
 */
class Rate implements RateInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * @var float
     */
    private $rate;

    /**
     * Rate constructor.
     * @param $rate
     * @param $base
     */
    public function __construct($rate, $base)
    {
        $this->rate = $rate;
        $this->base = $base;
    }

    /**
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }
}
