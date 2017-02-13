<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface RateInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateInterface
{
    /**
     * @return string
     */
    public function getBase();

    /**
     * @return float
     */
    public function getRate();
}
