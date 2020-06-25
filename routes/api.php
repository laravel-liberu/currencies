<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->namespace('LaravelEnso\Currencies\Http\Controllers')
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        require 'app/currencies.php';
        require 'app/exchangeRates.php';
    });
