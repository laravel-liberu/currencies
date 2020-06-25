<?php

namespace LaravelEnso\Currencies\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use LaravelEnso\Currencies\Models\Currency;
use LaravelEnso\Currencies\Services\FetchExchangeRates as Service;

class FetchExchangeRates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout;
    public $queue;

    public function __construct()
    {
        $this->queue = 'light';
        $this->timeout = 60;
    }

    public function handle()
    {
        (new Service(
            Currency::
            default()->first(),
            Currency::foreign()->get()
        ))->handle();
    }
}
