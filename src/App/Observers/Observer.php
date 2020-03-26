<?php

namespace LaravelEnso\Currencies\App\Observers;

use LaravelEnso\Currencies\App\Exceptions\Currency as Exception;
use LaravelEnso\Currencies\App\Models\Currency;

class Observer
{
    public function creating(Currency $currency)
    {
        $currency->is_default = ! Currency::query()->default()->exists();
    }

    public function deleting(Currency $currency)
    {
        if ($currency->is_default && Currency::count() > 1) {
            throw Exception::cannotDeleteDefault();
        }
    }
}
