<?php

use Illuminate\Database\Seeder;
use LaravelEnso\Currencies\app\Models\Currency;

class DefaultCurrencySeeder extends Seeder
{
    public function run()
    {
        $this->defaultCurrencies()
            ->each(function ($currency) {
                Currency::create($currency);
            });
    }

    public function defaultCurrencies()
    {
        return collect([
            ['name' => 'Leu', 'symbol' => 'RON', 'is_default' => true],
            ['name' => 'Euro', 'symbol' => '€', 'is_default' => false],
            ['name' => 'Dollar', 'symbol' => '$', 'is_default' => false],
        ]);
    }
}
