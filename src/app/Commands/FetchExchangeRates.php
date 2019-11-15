<?php

namespace LaravelEnso\Currencies\app\Commands;

use Illuminate\Console\Command;
use LaravelEnso\Currencies\app\Jobs\FetchExchangeRates as Job;

class FetchExchangeRates extends Command
{
    protected $signature = 'enso:currencies:fetch-exchange-rates';

    protected $description = 'Fetches the latest exchange rates through API';

    public function handle()
    {
        Job::dispatch();
    }
}
