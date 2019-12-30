<?php

use Illuminate\Support\Facades\Route;

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
