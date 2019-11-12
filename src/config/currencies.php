<?php

return [
    'converterPrecision' => 2,
    'fixerCurrencyApi' => [
        'host' => 'https://fixer-fixer-currency-v1.p.rapidapi.com',
        'key' => env('FIXER_CURRENCY_API_KEY', null),
    ],
];
