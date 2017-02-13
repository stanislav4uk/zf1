<?php

namespace App\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ApplicationProvider
 * @package App\Providers
 */
class ModelsProvider implements ServiceProviderInterface
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
        $pimple["\\App\\Models\\DbTable\\Rates"] = function () {
            return new \App\Models\DbTable\Rates();
        };
    }
}
