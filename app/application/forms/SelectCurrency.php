<?php
namespace App\Forms;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;
use App\Extensions\ExchangeRatesFetcher\StorageDrivers\Redis;

/**
 * Class SelectCurrency
 * @package App\Forms
 */
class SelectCurrency extends \Zend_Form_Element_Select
{
    public function init() {
        $rates = (new Redis())->all();

        /** @var RateInterface $rate */
        foreach ($rates->getRates() as $rate) {
            $this->addMultiOption($rate->getBase(), $rate->getBase());
        }

        $this->setValue($rates->getBase());
    }
}
