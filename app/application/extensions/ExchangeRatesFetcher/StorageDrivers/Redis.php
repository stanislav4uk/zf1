<?php
namespace App\Extensions\ExchangeRatesFetcher\StorageDrivers;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateCollectionInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\StorageInterface;

/**
 * Provides a way to store exchange rates using Redis as a storage.
 *
 * @package App\Extensions\ExchangeRatesFetcher\StorageDrivers
 */
class Redis implements StorageInterface
{
    /** @var \Predis\ClientInterface $redis */
    private $redis;

    /**
     * Creates a new storage driver.
     *
     * Redis constructor.
     */
    public function __construct()
    {
        $this->redis = new \Predis\Client();
    }

    /**
     * Gets all of the rates.
     *
     * @return RateCollectionInterface
     */
    public function all()
    {
        $rates = $this->redis->get("currency_rates");

        return unserialize($rates);
    }

    /**
     * Finds a rate in the collection by currency.
     *
     * @param $currency
     * @return RateInterface
     */
    public function find($currency)
    {
        $rates = $this->all()->getRates();

        return $rates[$currency];
    }

    /**
     * Saves the rates to the redis.
     *
     * @param RateCollectionInterface $rates
     */
    public function save(RateCollectionInterface $rates)
    {
        $this->redis->set("currency_rates", serialize($rates));
    }
}
