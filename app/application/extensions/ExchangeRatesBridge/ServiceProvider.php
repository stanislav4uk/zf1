<?php
namespace App\Extensions\ExchangeRatesBridge;

use App\Extensions\ExchangeRatesBridge\Providers\FixerProvider;
use App\Extensions\ExchangeRatesBridge\StorageDrivers\MySql;
use App\Extensions\ExchangeRatesFetcher\RateManager;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider
 * @package App\Extensions\ExchangeRatesBridge
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
        $pimple["App\\Extensions\\ExchangeRatesBridge\\Providers\\FixerProvider"] = function ($c) {
            return new FixerProvider();
        };

        $pimple["App\\Extensions\\ExchangeRatesFetcher\\RateManager"] = function ($c) {
            return new RateManager($c["App\\Extensions\\ExchangeRatesBridge\\Providers\\FixerProvider"]);
        };

        $pimple["App\\Extensions\\ExchangeRatesBridge\\StorageDrivers\\MySql"] = function ($c) {
            return new MySql($c["\\App\\Models\\DbTable\\Rates"]);
        };

    }
}
