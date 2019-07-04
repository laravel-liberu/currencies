<?php

use LaravelEnso\Migrator\app\Database\Migration;

class CreateStructureForExchangeRates extends Migration
{
    protected $permissions = [
        ['name' => 'administration.exchangeRates.index', 'description' => 'Show index for rate', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.exchangeRates.create', 'description' => 'Create rate', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.exchangeRates.store', 'description' => 'Store a new rate', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.exchangeRates.edit', 'description' => 'Edit rate', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.exchangeRates.update', 'description' => 'Update rate', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.exchangeRates.destroy', 'description' => 'Delete rate', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.exchangeRates.initTable', 'description' => 'Init table for rate', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.exchangeRates.tableData', 'description' => 'Get table data for rate', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.exchangeRates.exportExcel', 'description' => 'Export excel for rate', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Exchange Rates', 'icon' => 'coins', 'route' => 'administration.exchangeRates.index', 'order_index' => 20, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
