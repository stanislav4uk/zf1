<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface RateProviderInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateProviderInterface
{
    /**
     * @return RateCollectionInterface
     */
    public function get();
}
