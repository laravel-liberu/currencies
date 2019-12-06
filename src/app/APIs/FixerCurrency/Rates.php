<?php

namespace LaravelEnso\Currencies\app\APIs\FixerCurrency;

class Rates extends Exchange
{
    private const EndPoint = 'latest';

    public function handle()
    {
        return $this->api->endPoint(self::EndPoint)
            ->query($this->query())
            ->request();
    }

    private function query()
    {
        return [
            'base' => $this->base->code,
            'symbols' => $this->symbols(),
        ];
    }
}
