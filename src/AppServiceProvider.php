<?php

namespace LaravelEnso\Currencies;

use Carbon\Laravel\ServiceProvider;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Observers\Observer;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->load()
            ->publish()
            ->observe();
    }

    private function load()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        return $this;
    }

    private function publish()
    {
        $this->publishes([
            __DIR__.'/database/seeds' => database_path('seeds'),
        ], 'currency-seeder');
        
        return $this;
    }

    private function observe()
    {
        Currency::observe(Observer::class);
    }
}
