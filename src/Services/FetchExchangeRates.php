<?php

namespace LaravelLiberu\Currencies\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Currencies\APIs\FixerCurrency\Actions\Rates;
use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Currencies\Models\ExchangeRate;
use LaravelLiberu\Helpers\Services\Decimals;

class FetchExchangeRates
{
    private $currencies;
    private $response;
    private $precision;

    public function __construct(
        private Currency $base,
        private $toCurrencies
    ) {
        $this->precision = Config::get('liberu.currencies.apiPrecision');
    }

    public function handle()
    {
        $this->response = (new Rates($this->base, $this->toCurrencies))->handle()
            ->json();

        $this->currencies = Currency::all();

        $this->processAll();

        return $this;
    }

    private function processAll()
    {
        (new Collection($this->response['rates']))
            ->each(fn ($rate, $currency) => $this->process($rate, $currency));
    }

    private function process($rate, $currency)
    {
        $to = $this->currency($currency);

        $this->persist($this->base, $to, $rate);

        $reverseRate = Decimals::div(1, $rate, $this->precision);

        $this->persist($to, $this->base, $reverseRate);
    }

    private function persist(Currency $from, Currency $to, string $rate)
    {
        ExchangeRate::updateOrCreate([
            'from_id' => $from->id,
            'to_id' => $to->id,
            'date' => $this->response['date'],
        ], [
            'conversion' => $rate,
        ]);
    }

    private function currency(string $code)
    {
        return $this->currencies
            ->first(fn ($currency) => $currency->code === $code);
    }
}
