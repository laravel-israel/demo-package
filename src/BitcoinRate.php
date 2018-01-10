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
     * Suspend given amount.
     *
     * @param int    $amount
     * @param string $currency
     * @param string $payments
     * @param string $check
     *
     * @return mixed
     */
    public function get($currency = null)
    {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', $this->url);

        // if ($currency) {
        //     return $this->currency($response->getBody(), $currency);
        // }

        return $response->getBody();
    }

    /**
     * Suspend given amount.
     *
     * @param int    $amount
     * @param string $currency
     * @param string $payments
     * @param string $check
     *
     * @return mixed
     */
    public function convert($value, $currency = 'USD')
    {
        $client = new GuzzleHttp\Client();

        $response = $client->request('GET', 'https://blockchain.info/tobtc?currency='.$currency.'&value='.$value);

        return $response->getBody();
    }

    /**
     * Response.
     *
     * @param string $response
     * @param string $currency
     *
     * @return mixed
     */
    public function currency($response, $currency)
    {
        switch ($currency) {
            case 'USD':
                return $response['USD'];
            default:
                throw new InvalidArgumentException("Unsupported [{$currency}] currency.");
                break;
        }

        return $data;
    }
}
