<?php
namespace App\Forms;

use App\Extensions\ExchangeRatesBridge\StorageDrivers\MySql;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;
use App\Models\DbTable\Rates;

/**
 * Class SelectCurrency
 * @package App\Forms
 */
class SelectCurrency extends \Zend_Form_Element_Select
{
    public function init() {
        $model = new Rates();
        $storage = new MySql($model);
        $rates = $storage->all();

        /** @var RateInterface $rate */
        foreach ($rates->getRates() as $rate) {
            $this->addMultiOption($rate->getBase(), $rate->getBase());
        }

        $this->setValue($rates->getBase());
    }
}
