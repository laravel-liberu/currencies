<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use LaravelEnso\Currencies\app\Models\Currency;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'name' => Str::upper($faker->unique()->word),
        'symbol' => $faker->randomLetter,
        'is_default' => Currency::default()->first() === null,
    ];
});
