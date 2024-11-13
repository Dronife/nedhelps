<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\Http\Domain\Loan\LoanModifier;
use App\Http\Domain\Loan\LoanProvider;
use App\Http\Request\LoanCreateDto;
use App\Http\Request\LoanUpdateDto;
use App\Http\Requests\LoanUpdateRequest;
use App\Models\Loan;

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
}
