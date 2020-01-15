<?php

namespace LaravelEnso\Currencies\App\Exceptions;

use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class Conversion extends EnsoException
{
    public static function missingExchangeRate(Currency $from, Currency $to)
    {
        return new static(__(
            'No exchange rate found for :from to :to',
            ['from' => $from->name, 'to' => $to->name]
        ));
    }
}
