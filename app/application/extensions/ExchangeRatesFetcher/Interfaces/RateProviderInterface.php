<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Get exchange rates and currency conversions.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateProviderInterface
{
    /**
     * Get exchange rates and currency conversion.
     *
     * @return RateCollectionInterface
     */
    public function get();
}
