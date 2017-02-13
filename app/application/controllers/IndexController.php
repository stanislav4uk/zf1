<?php

/**
 * Class IndexController
 */
class IndexController extends Zend_Controller_Action
{
    /** @var \Pimple\Container */
    protected $container;

    /** @var \Zend_Form */
    protected $form;

    /** @var \App\Extensions\CurrencyConverter\Converter */
    protected $converter;

    /** @var  \App\Extensions\ExchangeRatesFetcher\Interfaces\StorageInterface */
    protected $rates;

    /** @var  \App\Managers\ConvertingStoryManager */
    protected $convertingStory;

    /**
     * Initial controller
     */
    public function init()
    {
        $this->container = $this->getInvokeArg('bootstrap')->getResource('dp_container');
        $this->form = $this->container["\\App\\Forms\\ConverterForm"];
        $this->converter = $this->container["App\\Extensions\\CurrencyConverter\\Converter"];
        $this->rates = $this->container["App\\Extensions\\ExchangeRatesBridge\\StorageDrivers\\MySql"];
        $this->convertingStory = $this->container["App\\Managers\\ConvertingStoryManager"];
    }

    /**
     * Home page
     */
    public function indexAction()
    {
        $this->view->form = $this->form;
        $this->view->story = $this->convertingStory->get();
    }

    /**
     * Converter currency
     */
    public function convertAction()
    {
        $quantity = floatval($this->getParam("quantity"));
        $from     = $this->rates->find($this->getParam("from"));
        $to       = $this->rates->find($this->getParam("to"));

        $result = round($this->converter->convert($from, $to, $quantity), 4);
        $this->convertingStory->set([
            "from"      => $from->getBase(),
            "to"        => $to->getBase(),
            "quantity"  => $quantity,
            "result"    => $result
        ]);

        $this->_helper->json($result);
    }
}

