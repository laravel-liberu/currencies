<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['api', 'auth', 'core'])
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        require __DIR__.'/app/currencies.php';
        require __DIR__.'/app/exchangeRates.php';
    });
