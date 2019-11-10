<?php

namespace LaravelEnso\Currencies\app\Services;

use LaravelEnso\Helpers\app\Classes\Decimals;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Models\ExchangeRate;
use LaravelEnso\Currencies\app\APIs\FixerCurrency\Rates;

class FetchExchangeRates
{
    private $base;
    private $toCurrencies;
    private $currencies;
    private $response;

    public function __construct(Currency $base, $toCurrencies)
    {
        $this->base = $base;
        $this->toCurrencies = $toCurrencies;
    }

    public function handle()
    {
        $this->response = (new Rates(
            $this->base, $this->toCurrencies
        ))->handle();

        $this->currencies = Currency::all();

        $this->process();

        return $this;
    }

    private function process()
    {
        collect($this->response->rates)->each(function ($conversion, $currency) {
            $to = $this->currency($currency);

            $this->persist($this->base, $to, $conversion);

            $reverseConversion = Decimals::div(1, $conversion, Converter::Precision);

            $this->persist($to, $this->base, $reverseConversion);
        });
    }

    private function persist(Currency $from, Currency $to, $conversion)
    {
        ExchangeRate::updateOrCreate([
            'from_id' => $from->id,
            'to_id' => $to->id,
            'date' => $this->response->date,
        ], [
            'conversion' => $conversion,
        ]);
    }

    private function currency(string $shortName)
    {
        return $this->currencies->first(function ($currency) use ($shortName) {
            return $currency->short_name === $shortName;
        });
    }
}
