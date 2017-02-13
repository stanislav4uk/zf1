<?php
namespace App\Extensions\CurrencyConverter\Interfaces;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Provides a method for conversion using given rates and quantity
 *
 * Interface ConverterInterface
 * @package App\Extensions\CurrencyConverter\Interfaces
 */
interface ConverterInterface
{
    /**
     * Should return a float after performing the conversion
     *
     * @param RateInterface $from
     * @param RateInterface $to
     * @param float         $quantity
     *
     * @return float
     */
    public function convert(RateInterface $from, RateInterface $to, $quantity);
}
