<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Create collection of values for foreign exchange rates and currencies.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateCollectionInterface
{
    /**
     * Returns the base currency.
     *
     * @return string
     */
    public function getBase();

    /**
     * Returns exchange rates.
     *
     * @return array
     */
    public function getRates();
}
