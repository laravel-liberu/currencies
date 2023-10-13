<?php

namespace LaravelLiberu\Currencies;

use Illuminate\Support\ServiceProvider;
use LaravelLiberu\Currencies\Commands\FetchExchangeRates;

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

        $this->mergeConfigFrom(__DIR__.'/../config/currencies.php', 'liberu.currencies');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/../database/factories' => database_path('factories'),
        ], ['currency-factories', 'liberu-factories']);

        $this->publishes([
            __DIR__.'/../database/seeders' => database_path('seeders'),
        ], ['currency-seeder', 'liberu-seeders']);

        $this->publishes([
            __DIR__.'/../config' => config_path('liberu'),
        ], ['currencies-config', 'liberu-config']);

        return $this;
    }
}
