<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface RateManagerInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateManagerInterface
{
    /**
     * Get rates
     *
     * @return RateCollectionInterface
     */
    public function fetch();
}
