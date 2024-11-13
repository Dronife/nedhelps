<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Collection;

class LoanRepository
{
    public function findById(int $id): ?Loan
    {
        return Loan::where('id', $id)->first();
    }

    /**
     * @return Collection<Loan>
     */
    public function findAll(): Collection
    {
        return Loan::all();
    }
}
