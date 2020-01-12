<?php

namespace LaravelEnso\Currencies\App\Services;

use Carbon\Carbon;
use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Currencies\App\Models\ExchangeRate;
use LaravelEnso\Helpers\App\Classes\Decimals;

class Converter
{
    private Carbon $date;
    private Currency $default;
    private Currency $from;
    private Currency $to;
    private $amount;
    private int $precision;

    public function __construct()
    {
        $this->date = Carbon::today();

        $this->precision = config('enso.currencies.converterPrecision');
    }

    public function handle()
    {
        return Decimals::mul(
            $this->amount,
            optional($this->rate())->conversion,
            $this->precision
        );
    }

    public function from(Currency $from)
    {
        $this->from = $from;

        return $this;
    }

    public function to(Currency $to)
    {
        $this->to = $to;

        return $this;
    }

    public function amount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    public function date(Carbon $date)
    {
        $this->date = $date;

        return $this;
    }

    public function precision(int $precision)
    {
        $this->precision = $precision;

        return $this;
    }

    private function rate()
    {
        return $this->todayRate() ?? $this->mostRecentRate();
    }

    private function todayRate(): ?ExchangeRate
    {
        return $this->fromCurrency()->fromExchangeRates()
            ->whereToId($this->toCurrency()->id)
            ->whereDate('date', $this->date)
            ->orderByDesc('date')
            ->first();
    }

    private function mostRecentRate(): ExchangeRate
    {
        return $this->fromCurrency()->fromExchangeRates()
            ->whereToId($this->toCurrency()->id)
            ->orderByDesc('date')
            ->first();
    }

    private function fromCurrency(): Currency
    {
        return $this->from ??= $this->default();
    }

    private function toCurrency(): Currency
    {
        return $this->to ??= $this->default();
    }

    private function default(): Currency
    {
        return $this->default ??= Currency::query()->default()->first();
    }
}
