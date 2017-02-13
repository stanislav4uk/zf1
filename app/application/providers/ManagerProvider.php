<?php
namespace App\Providers;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ManagerProvider implements ServiceProviderInterface
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
        $pimple["App\\Managers\\ConvertingStoryManager"] = function () {
            return new \App\Managers\ConvertingStoryManager();
        };
    }
}