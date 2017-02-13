<?php
namespace App\Extensions\CurrencyConverter;

use App\Extensions\CurrencyConverter\Interfaces\ConverterInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Provides a method for conversion
 *
 * @package App\Extensions\CurrencyConverter
 */
class Converter implements ConverterInterface
{
    /**
     * Performs conversion according to given rates
     *
     * @param RateInterface $from
     * @param RateInterface $to
     * @param float         $quantity
     *
     * @return float
     */
    public function convert(RateInterface $from, RateInterface $to, $quantity)
    {
        return ($to->getRate() / $from->getRate()) * $quantity;
    }
}
