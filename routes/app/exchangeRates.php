<?php

use Illuminate\Support\Facades\Route;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\Create;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\Destroy;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\Edit;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\ExportExcel;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\InitTable;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\Store;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\TableData;
use LaravelLiberu\Currencies\Http\Controllers\ExchangeRates\Update;

Route::prefix('exchangeRates')->as('exchangeRates.')
    ->group(function () {
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{exchangeRate}/edit', Edit::class)->name('edit');
        Route::patch('{exchangeRate}', Update::class)->name('update');
        Route::delete('{exchangeRate}', Destroy::class)->name('destroy');

        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');
    });
