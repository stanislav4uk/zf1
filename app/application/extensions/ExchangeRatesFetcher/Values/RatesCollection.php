<?php
namespace App\Extensions\ExchangeRatesFetcher\Values;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateCollectionInterface;

/**
 * Class RatesCollection
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
     * Currency constructor.
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
     * @return string
     */
    public function getBase()
    {
        return $this->base;
    }

    /**
     * @return array
     */
    public function getRates()
    {
        return $this->rates;
    }
}
