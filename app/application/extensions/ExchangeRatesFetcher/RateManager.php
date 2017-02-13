<?php
namespace App\Extensions\ExchangeRatesFetcher;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateManagerInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateProviderInterface;

/**
 * Class RateManager
 * @package App\Extensions\ExchangeRatesFetcher
 */
class RateManager implements RateManagerInterface
{
    /**
     * @var RateProviderInterface
     */
    private $provider;

    /**
     * RateManager constructor.
     *
     * @param RateProviderInterface $provider
     */
    public function __construct(RateProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return Interfaces\RateCollectionInterface
     */
    public function fetch()
    {
        return $this->provider->get();
    }
}
