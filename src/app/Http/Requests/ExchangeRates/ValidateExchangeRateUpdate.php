<?php
namespace LaravelEnso\Currencies\app\Http\Requests\ExchangeRates;

class ValidateExchangeRateUpdate extends ValidateExchangeRateStore
{
    protected function exchangeRate() {
        return parent::exchangeRate()
            ->where('id', '<>', $this->route('exchangeRate')->id);
    }
}