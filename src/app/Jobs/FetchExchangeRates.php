<?php

namespace LaravelEnso\Currencies\app\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Console\Command;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Services\FetchExchangeRates as Service;

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
            Currency::default()->first(),
            Currency::foreign()->get()
        ))->handle();
    }
}
