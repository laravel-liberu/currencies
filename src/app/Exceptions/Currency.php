<?php

namespace LaravelEnso\Currencies\app\Exceptions;

use LaravelEnso\Helpers\app\Exceptions\EnsoException;

class Currency extends EnsoException
{
    public static function cannotDeleteDefault()
    {
        return new static(__('You are not allowed to delete the default currency!'));
    }
}
