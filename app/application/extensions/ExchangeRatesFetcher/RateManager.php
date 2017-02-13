<?php
namespace App\Extensions\ExchangeRatesFetcher;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateManagerInterface;
use App\Extensions\ExchangeRatesFetcher\Interfaces\RateProviderInterface;

/**
 * Gets exchange rates and currency conversion.
 *
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
     * {@inheritdoc}
     */
    public function fetch()
    {
        return $this->provider->get();
    }
}
