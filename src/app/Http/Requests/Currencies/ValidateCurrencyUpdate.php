<?php
namespace LaravelEnso\Currencies\app\Http\Requests\Currencies;

class ValidateCurrencyUpdate extends ValidateCurrencyStore
{
    protected function uniqueName()
    {
        return parent::uniqueName()
            ->ignore($this->route('currency')->id);
    }
}