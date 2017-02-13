<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface RateCollectionInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface RateCollectionInterface
{
    /**
     * @return string
     */
    public function getBase();

    /**
     * @return array
     */
    public function getRates();
}
