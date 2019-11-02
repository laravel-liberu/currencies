<?php

namespace LaravelEnso\Currencies\app\APIs\FixerCurrency;

use LaravelEnso\Currencies\app\Models\Currency;

class Convert
{
    private const EndPoint = 'convert';

    private $api;
    private $from;
    private $to;
    private $amount;

    public function __construct(Currency $from, Currency $to, float $amount)
    {
        $this->api = new Api();
        $this->from = $from;
        $this->to = $to;
        $this->amount = $amount;
    }

    public function handle()
    {
        return $this->api->endPoint(self::EndPoint)
            ->query($this->query())
            ->request();
    }

    private function query()
    {
        return [
            'from' => $this->from->short_name,
            'to' => $this->to->short_name,
            'amount' => $this->amount,
        ];
    }
}
