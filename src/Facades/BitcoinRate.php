<?php

namespace LaravelIsrael\BitcoinRate\Facades;

use Illuminate\Support\Facades\Facade;

class BitcoinRate extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bitcoin-rate';
    }
}
