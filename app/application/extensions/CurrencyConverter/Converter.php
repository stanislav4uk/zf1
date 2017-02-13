<?php
namespace App\Extensions\CurrencyConverter;

use App\Extensions\CurrencyConverter\Interfaces\ConverterInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Class Converter
 * @package App\Extensions\CurrencyConverter
 */
class Converter implements ConverterInterface
{
    /**
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
