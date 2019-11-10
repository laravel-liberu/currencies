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
            ['short_name' => 'USD', 'name' => 'US Dollar', 'symbol' => '$', 'is_default' => true],
            ['short_name' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'is_default' => false],
            ['short_name' => 'GBP', 'name' => 'GB Pound', 'symbol' => '£', 'is_default' => false],
            ['short_name' => 'RON', 'name' => 'Romanian Leu', 'symbol' => 'lei', 'is_default' => false],
            ['short_name' => 'AUD', 'name' => 'Australian dollar', 'symbol' => '$', 'is_default' => false],
            ['short_name' => 'CZK', 'name' => 'Czech koruna', 'symbol' => 'Kč', 'is_default' => false],
            ['short_name' => 'DKK', 'name' => 'Danish krone', 'symbol' => 'kr', 'is_default' => false],
            ['short_name' => 'HUF', 'name' => 'forint', 'symbol' => 'Ft', 'is_default' => false],
            ['short_name' => 'ILS', 'name' => 'shekel', 'symbol' => '₪', 'is_default' => false],
            ['short_name' => 'MYR', 'name' => 'ringgit', 'symbol' => 'RM', 'is_default' => false],
            ['short_name' => 'NZD', 'name' => 'New Zealand dollar', 'symbol' => '$', 'is_default' => false],
            ['short_name' => 'NOK', 'name' => 'Norwegian krone', 'symbol' => 'kr', 'is_default' => false],
            ['short_name' => 'PLN', 'name' => 'zloty', 'symbol' => 'zł', 'is_default' => false],
            ['short_name' => 'RSD', 'name' => 'Serbian dinar', 'symbol' => '', 'is_default' => false],
            ['short_name' => 'SGD', 'name' => 'Singapore dollar', 'symbol' => '$', 'is_default' => false],
            ['short_name' => 'SEK', 'name' => 'krona', 'symbol' => 'kr', 'is_default' => false],
            ['short_name' => 'CHF', 'name' => 'Swiss franc', 'symbol' => 'CHF', 'is_default' => false],
            ['short_name' => 'UAH', 'name' => 'hryvnia', 'symbol' => '₴', 'is_default' => false],
            ['short_name' => 'AED', 'name' => 'UAE dirham', 'symbol' => 'AED', 'is_default' => false],
        ]);
    }
}
