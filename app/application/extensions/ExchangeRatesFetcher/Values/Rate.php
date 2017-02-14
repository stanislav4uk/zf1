<?php
namespace App\Extensions\ExchangeRatesFetcher\Values;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Value of exchange rate and currency.
 *
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
     * Creates a new rate.
     *
     * @param $rate
     * @param string $base
     * @throws \Exception
     */
    public function __construct($rate, $base)
    {
        if (!is_numeric($rate)) {
            throw new \Exception("Invalid rate argument");
        }
        if (!is_string($base)) {
            throw new \Exception("Invalid base argument");
        }

        $this->rate = $rate;
        $this->base = $base;
    }

    /**
     * Returns currency.
     *
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Returns rate.
     *
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }
}
