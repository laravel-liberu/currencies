<?php

namespace LaravelEnso\Currencies\app\Services;

use LaravelEnso\Currencies\app\APIs\FixerCurrency\Rates;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

class FetchExchangeRates
{
    private $base;
    private $currencies;
    private $response;

    public function __construct(Currency $base, $currencies)
    {
        $this->base = $base;
        $this->currencies = $currencies;
    }

    public function handle()
    {
        $this->response = (new Rates(
            $this->base, $this->currencies
        ))->handle();

        collect($this->response->rates)->each(function ($conversion, $currency) {
            ExchangeRate::updateOrCreate([
                'from_id' => $this->base->id,
                'to_id' => $this->currency($currency)->id,
                'date' => $this->response->date,
            ], [
                'conversion' => $conversion,
            ]);
        });
    }

    private function currency(string $shortName)
    {
        return $this->currencies->first(function (Currency $currency) use ($shortName) {
            return $currency->short_name === $shortName;
        });
    }
}
