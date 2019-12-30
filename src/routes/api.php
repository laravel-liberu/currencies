<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth', 'core'])
    ->namespace('LaravelEnso\Currencies\App\Http\Controllers')
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        require 'app/currencies.php';
        require 'app/exchangeRates.php';
    });
