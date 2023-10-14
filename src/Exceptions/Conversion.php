<?php

namespace LaravelLiberu\Currencies\Exceptions;

use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Helpers\Exceptions\LiberuException;

class Conversion extends LiberuException
{
    public static function missingExchangeRate(Currency $from, Currency $to)
    {
        return new static(__(
            'No exchange rate found for :from to :to',
            ['from' => $from->name, 'to' => $to->name]
        ));
    }
}
