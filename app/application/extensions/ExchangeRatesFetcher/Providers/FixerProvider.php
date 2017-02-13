<?php
namespace App\Extensions\ExchangeRatesFetcher\Providers;

use App\Extensions\ExchangeRatesFetcher\Interfaces\RateProviderInterface;
use App\Extensions\ExchangeRatesFetcher\Values\Rate;
use App\Extensions\ExchangeRatesFetcher\Values\RatesCollection;

/**
 * Gets exchange rates and currency conversion.
 *
 * @package App\Extensions\ExchangeRatesFetcher\Providers
 */
class FixerProvider implements RateProviderInterface
{
    /**
     * Default currency for request.
     */
    const BASE_CURRENCY = "USD";

    /**
     * External api URL.
     *
     * @var string
     */
    private $apiUrl = "http://api.fixer.io";

    /**
     * Gets exchange rates and currency conversion.
     *
     * @return RatesCollection
     * @throws \Exception
     */
    public function get()
    {
        $result = $this->request("/latest", array("base" => self::BASE_CURRENCY));

        if (empty($result["rates"]) && empty($result["base"])) {
            throw new \Exception("Currency rates none ");
        }

        $rates = array();
        $rates[self::BASE_CURRENCY] = new Rate(1, self::BASE_CURRENCY);

        foreach ($result["rates"] as $currency => $rate) {
            $rates[$currency] = new Rate($rate, $currency);
        }

        return new RatesCollection($rates, $result["base"]);
    }

    /**
     * The request to the external api to get data.
     *
     * @param $url
     * @param array $params
     * @return mixed|null
     */
    private function request($url, array $params) {
        $params = http_build_query($params);
        $base = sprintf("%s%s?%s", $this->apiUrl, $url, $params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $base);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);

        curl_close($ch);

        if (empty($response)) {
            return null;
        }

        return json_decode($response, true);
    }
}
