<?php

use LaravelEnso\Migrator\App\Database\Migration;
use LaravelEnso\Permissions\App\Enums\Types;

class CreateStructureForCurrencies extends Migration
{
    protected $permissions = [
        ['name' => 'administration.currencies.index', 'description' => 'Show index for currency', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.currencies.create', 'description' => 'Create currency', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.currencies.store', 'description' => 'Store a new currency', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.currencies.edit', 'description' => 'Edit currency', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.currencies.update', 'description' => 'Update currency', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.currencies.destroy', 'description' => 'Delete currency', 'type' => Types::Write, 'is_default' => false],
        ['name' => 'administration.currencies.initTable', 'description' => 'Init table for currency', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.currencies.tableData', 'description' => 'Get table data for currency', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.currencies.exportExcel', 'description' => 'Export excel for currency', 'type' => Types::Read, 'is_default' => false],
        ['name' => 'administration.currencies.options', 'description' => 'Get currency options for select', 'type' => Types::Read, 'is_default' => false],
    ];

    protected $menu = [
        'name' => 'Currencies', 'icon' => 'far money-bill-alt', 'route' => 'administration.currencies.index', 'order_index' => 325, 'has_children' => false,
    ];

    protected $parentMenu = 'Administration';
}
