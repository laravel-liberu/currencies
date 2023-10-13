<?php

namespace LaravelLiberu\Currencies\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use LaravelLiberu\Currencies\Exceptions\Conversion as Exception;
use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Currencies\Models\ExchangeRate;
use LaravelLiberu\Helpers\Services\Decimals;

class Conversion
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
        $this->precision = Config::get('enso.currencies.converterPrecision');
    }

    public function handle(): string
    {
        return $this->init()->convert();
    }

    public function from(Currency $from): self
    {
        $this->from = $from;

        return $this;
    }

    public function to(Currency $to): self
    {
        $this->to = $to;

        return $this;
    }

    public function amount($amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function date(Carbon $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function precision(int $precision): self
    {
        $this->precision = $precision;

        return $this;
    }

    private function init(): self
    {
        $this->from ??= $this->default();
        $this->to ??= $this->default();

        return $this;
    }

    private function convert(): string
    {
        $args = [$this->amount, $this->rate()->conversion, $this->precision];

        return Decimals::mul(...$args);
    }

    private function rate(): ExchangeRate
    {
        if ($this->from->is($this->to)) {
            return new ExchangeRate(['conversion' => 1]);
        }

        $rate = $this->todayRate() ?? $this->mostRecentRate();

        if (! $rate) {
            throw Exception::missingExchangeRate($this->from, $this->to);
        }

        return $rate;
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
