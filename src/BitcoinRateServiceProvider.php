<?php

namespace LaravelIsrael\BitcoinRate;

use Illuminate\Support\ServiceProvider;

class BitcoinRateServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/bitcoin-rate.php', 'bitcoin-rate');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/bitcoin-rate.php' => config_path('bitcoin-rate.php'),
            ], 'bitcoin-rate-config');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('bitcoin-rate', function () {
            return new BitcoinRate();
        });
    }
}
