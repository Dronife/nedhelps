<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Models\Loan;

class LoanRepository
{
    public function findById(int $id): ?Loan
    {
        return Loan::where('id', $id)->first();
    }
}
