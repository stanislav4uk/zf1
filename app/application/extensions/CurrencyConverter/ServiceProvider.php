<?php
namespace App\Extensions\CurrencyConverter;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 * @package App\Extensions\HandlerConverter
 */
class ServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $pimple A container instance
     */
    public function register(Container $pimple)
    {
        $pimple["App\\Extensions\\CurrencyConverter\\Converter"] = function ($c) {
            return new \App\Extensions\CurrencyConverter\Converter();
        };
    }
}
