<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use LaravelEnso\Currencies\app\Models\Currency;

$factory->define(Currency::class, function (Faker $faker) {
    return [
        'short_name' => Str::upper($faker->unique()->randomLetter),
        'name' => Str::upper($faker->unique()->word),
        'symbol' => $faker->unique()->randomLetter,
        'is_default' => Currency::default()->first() === null,
    ];
});
