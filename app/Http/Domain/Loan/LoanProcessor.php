<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Http\Request\LoanUpdateDto;
use App\Http\Requests\LoanUpdateRequest;
use App\Models\Loan;

class LoanProcessor
{
    /**
     * @param string[] $presentKeys
     *
     * @return array<string, float|int>
     */
    public function processUpdate(LoanUpdateDto $loanUpdateDto, array $presentKeys): array
    {
        $data = [];
        $dtoArray = $loanUpdateDto->toArray();

        foreach ($presentKeys as $key) {
            $data[$key] = $dtoArray[$key];
        }

        return $data;
    }
}
