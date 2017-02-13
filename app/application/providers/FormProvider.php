<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class FormProvider
 * @package App\Providers
 */
class FormProvider implements ServiceProviderInterface
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
        $pimple["\\App\\Forms\\ConverterForm"] = function ($c) {
            return new \App\Forms\ConverterForm();
        };
    }
}