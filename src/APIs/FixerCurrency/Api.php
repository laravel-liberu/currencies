<?php

namespace LaravelEnso\Currencies\APIs\FixerCurrency;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class Api
{
    private string $endPoint;
    private array $query;

    public function request(): array
    {
        return Http::withHeaders($this->headers())
            ->get($this->endPoint, $this->query)
            ->throw()
            ->json();
    }

    public function endPoint(string $endPoint): self
    {
        $this->endPoint = $endPoint;

        return $this;
    }

    public function query(array $query): self
    {
        $this->query = $query;

        return $this;
    }

    private function headers()
    {
        return ['x-rapidapi-key' => Config::get('enso.currencies.fixerCurrencyApi.key')];
    }
}
