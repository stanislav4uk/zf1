<?php
namespace App\Extensions\ExchangeRatesBridge\StorageDrivers;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateCollectionInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\StorageInterface;

class Redis implements StorageInterface
{

    /**
     * @return RateCollectionInterface
     */
    public function all()
    {
        // TODO: Implement all() method.
    }

    /**
     * @param $currency
     * @param $base
     * @return RateInterface
     */
    public function find($currency, $base)
    {
        // TODO: Implement find() method.
    }

    /**
     * @param RateCollectionInterface $rate
     * @return bool
     */
    public function save(RateCollectionInterface $rate)
    {
        // TODO: Implement save() method.
    }
}