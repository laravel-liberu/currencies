<?php

use Illuminate\Support\Facades\Route;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Convert;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Create;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Destroy;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Edit;
use LaravelEnso\Currencies\Http\Controllers\Currencies\ExportExcel;
use LaravelEnso\Currencies\Http\Controllers\Currencies\InitTable;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Options;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Store;
use LaravelEnso\Currencies\Http\Controllers\Currencies\TableData;
use LaravelEnso\Currencies\Http\Controllers\Currencies\Update;

Route::prefix('currencies')->as('currencies.')
    ->group(function () {
        Route::get('create', Create::class)->name('create');
        Route::post('', Store::class)->name('store');
        Route::get('{currency}/edit', Edit::class)->name('edit');
        Route::patch('{currency}', Update::class)->name('update');
        Route::delete('{currency}', Destroy::class)->name('destroy');

        Route::get('initTable', InitTable::class)->name('initTable');
        Route::get('tableData', TableData::class)->name('tableData');
        Route::get('exportExcel', ExportExcel::class)->name('exportExcel');

        Route::get('options', Options::class)->name('options');

        Route::get('convert', Convert::class)->name('convert');
    });
