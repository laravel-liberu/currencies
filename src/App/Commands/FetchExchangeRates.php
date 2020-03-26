<?php

namespace LaravelEnso\Currencies\App\Commands;

use Illuminate\Console\Command;
use LaravelEnso\Currencies\App\Jobs\FetchExchangeRates as Job;

class FetchExchangeRates extends Command
{
    protected $signature = 'enso:currencies:fetch-exchange-rates';

    protected $description = 'Fetches the latest exchange rates through API';

    public function handle()
    {
        Job::dispatch();
    }
}
