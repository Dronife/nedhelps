<?php

declare(strict_types=1);

namespace App\Http\Service;

use App\Http\Domain\Loan\LoanModifier;
use App\Http\Request\LoanCreateDto;
use App\Http\Request\LoanUpdateDto;
use App\Http\Requests\LoanUpdateRequest;
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

    public function update(int $id, LoanUpdateDto $loanUpdateRequest, array $presentKeys): int
    {
        return $this->loanModifier->update($id, $loanUpdateRequest, $presentKeys);
    }

    public function delete(int $id): void
    {
        $this->loanModifier->delete($id);
    }
}
