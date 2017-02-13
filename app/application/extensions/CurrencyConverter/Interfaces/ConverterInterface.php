<?php
namespace App\Extensions\CurrencyConverter\Interfaces;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;

/**
 * Interface ConverterInterface
 * @package App\Extensions\CurrencyConverter\Interfaces
 */
interface ConverterInterface
{
    /**
     * @param RateInterface $from
     * @param RateInterface $to
     * @param float         $quantity
     *
     * @return float
     */
    public function convert(RateInterface $from, RateInterface $to, $quantity);
}
