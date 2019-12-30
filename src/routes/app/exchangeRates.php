<?php

use Illuminate\Support\Facades\Route;

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
    });
