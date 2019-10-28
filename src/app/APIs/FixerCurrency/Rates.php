<?php

namespace LaravelEnso\Currencies\app\APIs\FixerCurrency;

class Rates extends Exchange
{
    private const EndPoint = 'latest';

    public function handle()
    {
        return $this->api->endPoint(self::EndPoint)
            ->query([
                'base' => $this->base->short_name,
                'symbols' => $this->symbols(),
            ])->request();
    }
}
