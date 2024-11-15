<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Seeder;

class LoanSeeder extends Seeder
{
    public function run(): void
    {
        Loan::factory()->count(20)->create();
    }
}
