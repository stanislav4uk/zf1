<?php
namespace App\Extensions\ExchangeRatesBridge\StorageDrivers;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateCollectionInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\StorageInterface;
use App\Extensions\ExchangeRatesFetcher\Values\Rate;
use App\Extensions\ExchangeRatesFetcher\Values\RatesCollection;

/**
 * Class MySql
 * @package App\Extensions\ExchangeRatesBridge\StorageDrivers
 */
class MySql implements StorageInterface
{
    /**
     * @var \Zend_Db_Table_Abstract
     */
    private $dbTable;

    /**
     * MySql constructor.
     * @param \Zend_Db_Table_Abstract $dbTable
     */
    public function __construct(\Zend_Db_Table_Abstract $dbTable)
    {
        $this->dbTable = $dbTable;
    }

    /**
     * @return RateCollectionInterface
     */
    public function all()
    {
        $resultSet = $this->dbTable->fetchAll();
        $rates = [];

        foreach ($resultSet as $rate) {
            $rates[$rate['currency']] = new Rate($rate["rate"], $rate["currency"]);
        }

        return new RatesCollection($rates, "USD");
    }

    /**
     * @param $currency
     * @return RateInterface
     */
    public function find($currency)
    {
        $rates = $this->all()->getRates();

        return $rates[$currency];
    }

    /**
     * @param RateCollectionInterface $rateCollection
     * @return bool
     */
    public function save(RateCollectionInterface $rateCollection)
    {
        $this->truncateTable();

        /** @var RateInterface $rate */
        foreach ($rateCollection->getRates() as $rate) {
            $data = array(
                'currency' => $rate->getBase(),
                'rate' => $rate->getRate(),
                'base' => $rateCollection->getBase(),
            );
            $this->dbTable->insert($data);
        }
    }

    /**
     * @throws \Zend_Db_Table_Exception
     */
    private function truncateTable()
    {
        $this->dbTable->getAdapter()->query('TRUNCATE TABLE ' . $this->dbTable->info(\Zend_Db_Table::NAME));
    }
}