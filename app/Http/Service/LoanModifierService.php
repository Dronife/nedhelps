<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\Http\Domain\Loan\LoanModifier;
use App\Http\Request\LoanCreateDto;
use App\Models\Loan;

class LoanModifierService
{
    public function __construct(
        private readonly LoanModifier $loanModifier,
    ) {
    }

    public function create(LoanCreateDto $createLoanDto): Loan
    {
        return $this->loanModifier->create($createLoanDto);
    }
}