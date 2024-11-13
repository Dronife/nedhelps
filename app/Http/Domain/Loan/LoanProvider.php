<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Models\Loan;

class LoanProvider
{
    public function __construct(
        private readonly LoanRepository $loanRepository,
    ) {
    }

    public function getById(int $id): ?Loan
    {
        return $this->loanRepository->findById($id);
    }
}
