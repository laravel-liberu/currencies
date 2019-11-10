<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Core\app\Models\User;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Currencies\app\Models\ExchangeRate;
use LaravelEnso\Forms\app\TestTraits\CreateForm;
use LaravelEnso\Forms\app\TestTraits\DestroyForm;
use LaravelEnso\Forms\app\TestTraits\EditForm;
use LaravelEnso\Tables\app\Traits\Tests\Datatable;
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

        // $this->withoutExceptionHandling();

        $this->seed()
            ->actingAs(User::first());

        $this->from = factory(Currency::class)->create();
        $this->from->update(['is_default' => true]);
        $this->to = factory(Currency::class)->create();
        $this->testModel = factory(ExchangeRate::class)->make([
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
