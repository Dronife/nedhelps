<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers\API;

use App\Http\Shared\KeyTrait;
use App\Models\Loan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase as TestBase;

class LoanControllerTest extends TestBase
{
    use RefreshDatabase, WithFaker, KeyTrait;

    protected function setUp(): void
    {
        parent::setUp();
        $this->setUpFaker();
    }

    public function testCanCreateLoan(): void
    {
        $payload = [
            'amount' => $this->faker->randomFloat(2, 1000, 50000),
            'interestRate' => $this->faker->randomFloat(2, 1, 20),
            'duration' => $this->faker->numberBetween(6, 60),
        ];

        $response = $this->postJson('/api/loans', $payload);

        $response->assertStatus(200)
            ->assertJsonFragment($this->toSnakeCase($payload));

        $this->assertDatabaseHas('loans', $this->toSnakeCase($payload));
    }

    public function testCanFetchAllLoans(): void
    {
        Loan::factory()->count(5)->create();

        $response = $this->getJson('/api/loans');

        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function testCanFetchSingleLoan(): void
    {
        $loan = Loan::factory()->create();

        $response = $this->getJson("/api/loans/{$loan->id}");

        $response->assertStatus(200)
            ->assertJsonFragment([
                'id' => $loan->id,
                'amount' => "{$loan->amount}",
            ]);
    }

    public function testCanUpdateLoan(): void
    {
        $loan = Loan::factory()->create();

        $updateData = [
            'amount' => $this->faker->randomFloat(2, 1000, 50000),
        ];

        $response = $this->patchJson("/api/loans/{$loan->id}", $updateData);

        $response->assertStatus(200)
            ->assertJsonFragment([$loan->id]);

        $this->assertDatabaseHas('loans', $this->toSnakeCase($updateData + ['id' => $loan->id]));
    }

    public function testCanDeleteLoan(): void
    {
        $loan = Loan::factory()->create();

        $response = $this->deleteJson("/api/loans/{$loan->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('loans', ['id' => $loan->id]);
    }
}
