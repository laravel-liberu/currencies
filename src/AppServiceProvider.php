<?php

namespace LaravelEnso\Currencies;

use Carbon\Laravel\ServiceProvider;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Observers\Observer;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        Currency::observe(Observer::class);
    }
}