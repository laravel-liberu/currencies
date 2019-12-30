<?php

use LaravelEnso\Migrator\App\Database\Migration;
use LaravelEnso\Permissions\App\Enums\Types;

class CreateStructureForExchangeRates extends Migration
{
    protected $permissions = [
        ['name' => 'administration.exchangeRates.index', 'description' => 'Show index for rate', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.exchangeRates.create', 'description' => 'Create rate', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.exchangeRates.store', 'description' => 'Store a new rate', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.exchangeRates.edit', 'description' => 'Edit rate', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.exchangeRates.update', 'description' => 'Update rate', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.exchangeRates.destroy', 'description' => 'Delete rate', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.exchangeRates.initTable', 'description' => 'Init table for rate', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.exchangeRates.tableData', 'description' => 'Get table data for rate', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.exchangeRates.exportExcel', 'description' => 'Export excel for rate', 'type' => Types::Read, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Exchange Rates', 'icon' => 'coins', 'route' => 'administration.exchangeRates.index', 'order_index' => 350, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
