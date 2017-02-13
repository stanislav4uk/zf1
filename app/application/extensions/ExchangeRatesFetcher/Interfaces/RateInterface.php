<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Defines rate value.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateInterface
{
    /**
     * Returns currency.
     *
     * @return string
     */
    public function getBase();

    /**
     * Returns value.
     *
     * @return float
     */
    public function getRate();
}
