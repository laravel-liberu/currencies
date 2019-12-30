<?php

namespace LaravelEnso\Currencies\App\Services;

use Carbon\Carbon;
use LaravelEnso\Currencies\App\Models\Currency;
use LaravelEnso\Helpers\App\Classes\Decimals;

class Converter
{
    private Carbon $date;
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

    private function todayRate()
    {
        if (! $this->from) {
            $this->from = Currency::default()->first();
        }

        if (! $this->to) {
            $this->to = Currency::default()->first();
        }

        return $this->from->fromExchangeRates()
            ->whereToId($this->to->id)
            ->whereDate('date', $this->date)
            ->orderByDesc('date')
            ->first();
    }

    private function mostRecentRate()
    {
        return $this->from->fromExchangeRates()
            ->whereToId($this->to->id)
            ->orderByDesc('date')
            ->first();
    }
}
