<?php

namespace LaravelLiberu\Currencies\Commands;

use Illuminate\Console\Command;
use LaravelLiberu\Currencies\Jobs\FetchExchangeRates as Job;

class FetchExchangeRates extends Command
{
    protected $signature = 'enso:currencies:fetch-exchange-rates';

    protected $description = 'Fetches the latest exchange rates through API';

    public function handle()
    {
        Job::dispatch();
    }
}
