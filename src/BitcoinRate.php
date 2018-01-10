<?php

namespace LaravelIsrael\BitcoinRate;

use GuzzleHttp;

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
     * @return mixed
     */
    public function rates()
    {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', $this->url);

        return $response;
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

        return $response;
    }
}
