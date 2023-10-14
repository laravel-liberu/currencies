<?php

namespace LaravelLiberu\Currencies\Exceptions;

use LaravelLiberu\Helpers\Exceptions\LiberuException;

class Currency extends LiberuException
{
    public static function cannotDeleteDefault()
    {
        return new static(__('You are not allowed to delete the default currency!'));
    }
}
