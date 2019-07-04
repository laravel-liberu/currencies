<?php

use Tests\TestCase;
use LaravelEnso\Core\app\Models\User;
use LaravelEnso\Forms\app\TestTraits\EditForm;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Forms\app\TestTraits\CreateForm;
use LaravelEnso\Forms\app\TestTraits\DestroyForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Tables\app\Traits\Tests\Datatable;

class CurrencyTest extends TestCase
{
    use Datatable, DestroyForm, EditForm, CreateForm, RefreshDatabase;

    private $permissionGroup = 'administration.currencies';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = factory(Currency::class)
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
