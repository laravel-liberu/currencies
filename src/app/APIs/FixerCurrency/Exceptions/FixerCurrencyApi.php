<?php

namespace LaravelEnso\Currencies\App\APIs\Exceptions;

use Exception;

class FixerCurrencyApi extends Exception
{
    public static function unableToConnect($code)
    {
        return new static("Unable to connect to FixerCurrencyAPI. Status code: {$code}");
    }

    public static function error($code, $type)
    {
        return new static("An error was received. Error code: {$code}. Error type:{$type}");
    }
}
