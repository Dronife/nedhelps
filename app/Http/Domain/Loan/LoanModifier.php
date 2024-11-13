<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Http\Request\LoanCreateDto;
use App\Http\Shared\KeyTrait;
use App\Models\Loan;
use Illuminate\Support\Facades\DB;

class LoanModifier
{
    use KeyTrait;

    /**
     * @throws \Exception
     */
    public function create(LoanCreateDto $loanCreateDto): Loan
    {
        DB::beginTransaction();
        try {
            $data = $loanCreateDto->toArray();

            $loan = Loan::create($this->toSnakeCase($data));

            DB::commit();

            return $loan;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
