<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\Http\Domain\Loan\LoanProvider;
use App\Models\Loan;
use Illuminate\Database\Eloquent\Collection;

class LoanProviderService
{
    public function __construct(
        private readonly LoanProvider $loanProvider,
    ) {
    }

    public function fetchById(int $id): ?Loan
    {
        return $this->loanProvider->getById($id);
    }

    /**
     * @return Collection<Loan>
     */
    public function fetchAll(): Collection
    {
        return $this->loanProvider->getAll();
    }
}
