<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelLiberu\Core\Models\User;
use LaravelLiberu\Currencies\Models\Currency;
use LaravelLiberu\Currencies\Models\ExchangeRate;
use LaravelLiberu\Forms\TestTraits\CreateForm;
use LaravelLiberu\Forms\TestTraits\DestroyForm;
use LaravelLiberu\Forms\TestTraits\EditForm;
use LaravelLiberu\Tables\Traits\Tests\Datatable;
use Tests\TestCase;

class ExchangeRateTest extends TestCase
{
    use Datatable, DestroyForm, EditForm, CreateForm, RefreshDatabase;

    private $permissionGroup = 'administration.exchangeRates';
    private $testModel;
    private $from;
    private $to;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed()
            ->actingAs(User::first());

        $this->from = Currency::factory()->create();
        $this->from->update(['is_default' => true]);
        $this->to = Currency::factory()->create();
        $this->testModel = ExchangeRate::factory()->make([
            'from_id' => $this->from->id,
            'to_id' => $this->to->id,
        ]);
    }

    /** @test */
    public function can_store_exchange_rate()
    {
        $response = $this->post(
            route('administration.exchangeRates.store', [], false),
            $this->testModel->toArray()
        );

        $exchangeRate = ExchangeRate::query()
            ->whereFromId($this->testModel->from_id)
            ->whereToId($this->testModel->to_id)
            ->first();

        $response->assertStatus(200)
            ->assertJsonStructure(['message'])
            ->assertJsonFragment([
                'redirect' => 'administration.exchangeRates.edit',
                'param' => ['exchangeRate' => $exchangeRate->id],
            ]);
    }

    /** @test */
    public function can_update_exchange_rate()
    {
        tap($this->testModel)->save()
            ->conversion += 0.1;

        $this->patch(
            route('administration.exchangeRates.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals(
            $this->testModel->conversion,
            $this->testModel->fresh()->conversion
        );
    }
}
