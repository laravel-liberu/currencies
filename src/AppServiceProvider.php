<?php

namespace LaravelEnso\Currencies;

use Illuminate\Support\ServiceProvider;
use LaravelEnso\Currencies\Commands\FetchExchangeRates;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish()
            ->commands([FetchExchangeRates::class]);
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->mergeConfigFrom(__DIR__.'/../config/currencies.php', 'enso.currencies');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['currency-factories', 'enso-factories']);

        $this->publishes([
            __DIR__.'/../database/seeds' => database_path('seeds'),
        ], ['currency-seeder', 'enso-seeders']);

        $this->publishes([
            __DIR__.'/../config' => config_path('enso'),
        ], ['currencies-config', 'enso-config']);

        return $this;
    }
}
