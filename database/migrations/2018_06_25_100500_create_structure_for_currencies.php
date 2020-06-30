<?php

use LaravelEnso\Migrator\Database\Migration;

class CreateStructureForCurrencies extends Migration
{
    protected array $permissions = [
        ['name' => 'administration.currencies.index', 'description' => 'Show index for currency', 'is_default' => false],
        ['name' => 'administration.currencies.create', 'description' => 'Create currency', 'is_default' => false],
        ['name' => 'administration.currencies.store', 'description' => 'Store a new currency', 'is_default' => false],
        ['name' => 'administration.currencies.edit', 'description' => 'Edit currency', 'is_default' => false],
        ['name' => 'administration.currencies.update', 'description' => 'Update currency', 'is_default' => false],
        ['name' => 'administration.currencies.destroy', 'description' => 'Delete currency', 'is_default' => false],

        ['name' => 'administration.currencies.initTable', 'description' => 'Init table for currency', 'is_default' => false],
        ['name' => 'administration.currencies.tableData', 'description' => 'Get table data for currency', 'is_default' => false],
        ['name' => 'administration.currencies.exportExcel', 'description' => 'Export excel for currency', 'is_default' => false],

        ['name' => 'administration.currencies.options', 'description' => 'Get currency options for select', 'is_default' => false],

        ['name' => 'administration.currencies.convert', 'description' => 'Convert from one currency to another', 'is_default' => false],
    ];

    protected array $menu = [
        'name' => 'Currencies', 'icon' => 'far money-bill-alt', 'route' => 'administration.currencies.index', 'order_index' => 325, 'has_children' => false,
    ];

    protected ?string $parentMenu = 'Administration';
}
