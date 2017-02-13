<?php

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateManagerInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\StorageInterface;

/**
 * Class CronController
 */
class CronController extends \Zend_Controller_Action
{
    /**
     * @var \Pimple\Container
     */
    protected $container;

    /**
     * @var RateManagerInterface
     */
    protected $rateFetcher;

    /**
     * @var StorageInterface
     */
    protected $rateStorage;

    /**
     * Initial controller
     */
    public function init()
    {
        $this->container = $this->getInvokeArg('bootstrap')->getResource('dp_container');
        $this->rateFetcher = $this->container["App\\Extensions\\ExchangeRatesFetcher\\RateManager"];
        $this->rateStorage = $this->container["App\\Extensions\\ExchangeRatesFetcher\\StorageDrivers\\Redis"];;
    }

    /**
     * Update Rates
     */
    public function ratesAction()
    {
        $this->_helper->viewRenderer->setNoRender();
        $rates = $this->rateFetcher->fetch();
        $this->rateStorage->save($rates);
    }
}
