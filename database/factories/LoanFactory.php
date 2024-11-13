<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoanFactory extends Factory
{
    protected $model = Loan::class;

    public function definition(): array
    {
        return [
            'amount' => $this->faker->randomFloat(2, 1000, 50000),
            'interest_rate' => $this->faker->randomFloat(2, 1, 20),
            'duration' => $this->faker->numberBetween(6, 60),
            'duration_type' => $this->faker->randomElement([
                Loan::DURATION_TYPE_YEAR,
                Loan::DURATION_TYPE_MONTH,
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
