<?php

Route::middleware(['web', 'auth', 'core'])
    ->namespace('LaravelEnso\Currencies\app\Http\Controllers')
    ->prefix('api/administration')
    ->as('administration.')
    ->group(function () {
        Route::namespace('Currencies')
            ->prefix('currencies')->as('currencies.')
            ->group(function () {
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{currency}/edit', 'Edit')->name('edit');
                Route::patch('{currency}', 'Update')->name('update');
                Route::delete('{currency}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
            });

        Route::namespace('ExchangeRates')
            ->prefix('exchangeRates')->as('exchangeRates.')
            ->group(function () {
                Route::get('create', 'Create')->name('create');
                Route::post('', 'Store')->name('store');
                Route::get('{exchangeRate}/edit', 'Edit')->name('edit');
                Route::patch('{exchangeRate}', 'Update')->name('update');
                Route::delete('{exchangeRate}', 'Destroy')->name('destroy');

                Route::get('initTable', 'InitTable')->name('initTable');
                Route::get('tableData', 'TableData')->name('tableData');
                Route::get('exportExcel', 'ExportExcel')->name('exportExcel');

                Route::get('options', 'Options')->name('options');
            });
    });
