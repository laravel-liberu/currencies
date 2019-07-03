<?php
use Tests\TestCase;
use LaravelEnso\Core\app\Models\User;
use LaravelEnso\Forms\app\TestTraits\EditForm;
use LaravelEnso\Currencies\app\Models\Currency;
use LaravelEnso\Forms\app\TestTraits\CreateForm;
use LaravelEnso\Forms\app\TestTraits\DestroyForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Tables\app\Traits\Tests\Datatable;
use LaravelEnso\Currencies\app\Models\ExchangeRate;

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

        $this->withoutExceptionHandling();

        $this->seed()
            ->actingAs(User::first());

        $this->from = factory(Currency::class)->create();
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
            ->conversion = 0.5;

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

    /** @test */
    public function get_option_list()
    {
        $this->testModel->save();

        $this->get(route('administration.exchangeRates.options', [
            'query' => $this->testModel->from_id,
            'limit' => 10,
        ], false))
        ->assertStatus(200)
        ->assertJsonFragment($this->testModel->fresh()->toArray());
    }
}
