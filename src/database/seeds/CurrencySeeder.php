<?php

use Illuminate\Database\Seeder;
use LaravelEnso\Currencies\app\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $this->currencies()->each(function ($currency) {
            Currency::create($currency);
        });
    }

    public function currencies()
    {
        return collect([
            ['name' => 'Leu', 'symbol' => 'RON', 'is_default' => true],
            ['name' => 'Euro', 'symbol' => '€', 'is_default' => false],
            ['name' => 'Dollar', 'symbol' => '$', 'is_default' => false],
        ]);
    }
}
