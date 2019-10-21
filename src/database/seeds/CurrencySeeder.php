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
            ['name' => 'Leu', 'symbol' => 'leu-sign', 'is_default' => true],
            ['name' => 'Euro', 'symbol' => 'euro-sign', 'is_default' => false],
            ['name' => 'Dollar', 'symbol' => 'dollar-sign', 'is_default' => false],
            ['name' => 'Pound', 'symbol' => 'pound-sign', 'is_default' => false],
        ]);
    }
}
