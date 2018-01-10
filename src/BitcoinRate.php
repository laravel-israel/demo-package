<?php

namespace LaravelIsrael\BitcoinRate;

use GuzzleHttp;
use InvalidArgumentException;

class BitcoinRate
{
    /**
     * The Api URL.
     *
     * @var string
     */
    protected $url = 'https://blockchain.info/ticker';

    /**
     * Get rates.
     *
     * @param int    $amount
     * @param string $currency
     * @param string $payments
     * @param string $check
     *
     * @return mixed
     */
    public function rates($currency = null)
    {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', $this->url);

        return $response->getBody();
    }

    /**
     * Convert from given currency.
     *
     * @param int    $value
     * @param string $currency
     *
     * @return mixed
     */
    public function convert($value, $currency = 'USD')
    {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', 'https://blockchain.info/tobtc?currency='.$currency.'&value='.$value);

        return $response->getBody();
    }
}
