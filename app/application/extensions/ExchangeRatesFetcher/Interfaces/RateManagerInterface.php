<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Defines a contract for rate manager implementation.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateManagerInterface
{
    /**
     * Should return collection of rates as an instance of
     * RateCollectionInterface implementation.
     *
     * @return RateCollectionInterface
     */
    public function fetch();
}
