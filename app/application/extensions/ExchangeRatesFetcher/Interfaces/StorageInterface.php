<?php
namespace App\Extensions\ExchangeRatesFetcher\Interfaces;

/**
 * Interface defining a contract to interact with concrete storage engine in
 * order to store and retrieve exchange rates.
 *
 * Interface StorageInterface
 * @package App\Extensions\ExchangeRatesFetcher\Interfaces
 */
interface StorageInterface
{
    /**
     * Get all exchange rates.
     *
     * @return RateCollectionInterface
     */
    public function all();

    /**
     * Find a rate in the collection by currency.
     *
     * @param $currency
     * @return RateInterface
     */
    public function find($currency);

    /**
     * Save the rates.
     *
     * @param RateCollectionInterface $rate
     */
    public function save(RateCollectionInterface $rate);
}
