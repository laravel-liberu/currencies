<?php

use LaravelEnso\Migrator\app\Database\Migration;

class CreateStructureForCurrencies extends Migration
{
    protected $permissions = [
        ['name' => 'administration.currencies.index', 'description' => 'Show index for currency', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.currencies.create', 'description' => 'Create currency', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.currencies.store', 'description' => 'Store a new currency', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.currencies.edit', 'description' => 'Edit currency', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.currencies.update', 'description' => 'Update currency', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.currencies.destroy', 'description' => 'Delete currency', 'type' => 1, 'is_default' => false],
        ['name' => 'administration.currencies.initTable', 'description' => 'Init table for currency', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.currencies.tableData', 'description' => 'Get table data for currency', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.currencies.exportExcel', 'description' => 'Export excel for currency', 'type' => 0, 'is_default' => false],
        ['name' => 'administration.currencies.options', 'description' => 'Get currency options for select', 'type' => 0, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Currencies', 'icon' => 'far money-bill-alt', 'route' => 'administration.currencies.index', 'order_index' => 275, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
