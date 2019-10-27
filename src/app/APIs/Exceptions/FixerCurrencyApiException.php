<?php

namespace LaravelEnso\Currencies\app\APIs\Exceptions;

use Exception;

class FixerCurrencyApiException extends Exception
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