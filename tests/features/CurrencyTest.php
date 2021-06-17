<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Core\Models\User;
use LaravelEnso\Currencies\Models\Currency;
use LaravelEnso\Forms\TestTraits\CreateForm;
use LaravelEnso\Forms\TestTraits\DestroyForm;
use LaravelEnso\Forms\TestTraits\EditForm;
use LaravelEnso\Tables\Traits\Tests\Datatable;
use Tests\TestCase;

class CurrencyTest extends TestCase
{
    use Datatable, DestroyForm, EditForm, CreateForm, RefreshDatabase;

    private $permissionGroup = 'administration.currencies';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = Currency::factory()
            ->make();
    }

    /** @test */
    public function can_store_currency()
    {
        $response = $this->post(
            route('administration.currencies.store', [], false),
            $this->testModel->toArray()
        );

        $currency = Currency::whereName($this->testModel->name)
            ->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'administration.currencies.edit',
                'param' => ['currency' => $currency->id],
            ]);
    }

    /** @test */
    public function can_update_currency()
    {
        tap($this->testModel)->save()
            ->name = 'updated';

        $this->patch(
            route('administration.currencies.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals(
            $this->testModel->name,
            $this->testModel->fresh()->name
        );
    }

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('administration.currencies.options', [
            'query' => $this->testModel->name,
            'limit' => 10,
        ], false))
            ->assertStatus(200)
            ->assertJsonFragment(['name' => $this->testModel->name]);
    }
}
