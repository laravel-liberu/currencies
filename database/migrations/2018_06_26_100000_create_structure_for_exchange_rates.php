<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForExchangeRates extends Migration
{
    protected array $permissions = [
        ['name' => 'administration.exchangeRates.index', 'description' => 'Show index for rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.create', 'description' => 'Create rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.store', 'description' => 'Store a new rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.edit', 'description' => 'Edit rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.update', 'description' => 'Update rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.destroy', 'description' => 'Delete rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.initTable', 'description' => 'Init table for rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.tableData', 'description' => 'Get table data for rate', 'is_default' => false],
        ['name' => 'administration.exchangeRates.exportExcel', 'description' => 'Export excel for rate', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Exchange Rates', 'icon' => 'coins', 'route' => 'administration.exchangeRates.index', 'order_index' => 350, 'has_children' => false,
    ];

    protected string $parentMenu = 'Administration';
}
