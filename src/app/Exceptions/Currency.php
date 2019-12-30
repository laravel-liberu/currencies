<?php

namespace LaravelEnso\Currencies\App\Exceptions;

use LaravelEnso\Helpers\App\Exceptions\EnsoException;

class Currency extends EnsoException
{
    public static function cannotDeleteDefault()
    {
        return new static(__('You are not allowed to delete the default currency!'));
    }
}
