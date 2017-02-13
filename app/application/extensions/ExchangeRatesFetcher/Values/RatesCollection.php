<?php
namespace App\Extensions\ExchangeRatesFetcher\Values;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateCollectionInterface;

/**
 * Creates collection of values for foreign exchange rates and currencies.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Values
 */
class RatesCollection implements RateCollectionInterface
{
    /**
     * @var string
     */
    private $base;

    /**
     * @var array
     */
    private $rates;

    /**
     * Creates a new rate collection.
     *
     * @param Rate[] $rates
     * @param string $base
     */
    public function __construct(array $rates, $base)
    {
        $this->rates = $rates;
        $this->base = $base;
    }

    /**
     * Returns the base currency.
     *
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * Returns rate values.
     *
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }
}
