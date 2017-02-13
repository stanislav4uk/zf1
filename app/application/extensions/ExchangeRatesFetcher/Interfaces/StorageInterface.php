<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface StorageInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface StorageInterface
{
    /**
     * @return RateCollectionInterface
     */
    public function all();

    /**
     * @param $currency
     * @return RateInterface
     */
    public function find($currency);

    /**
     * @param RateCollectionInterface $rate
     * @return bool
     */
    public function save(RateCollectionInterface $rate);
}
