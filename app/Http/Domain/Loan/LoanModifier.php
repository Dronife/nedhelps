<?php

declare(strict_types=1);

namespace App\Http\Domain\Loan;

use App\Http\Request\LoanCreateDto;
use App\Http\Request\LoanUpdateDto;
use App\Http\Shared\KeyTrait;
use App\Models\Loan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class LoanModifier
{
    use KeyTrait;

    public function __construct(
        private readonly LoanProvider $loanProvider,
        private readonly LoanProcessor $loanProcessor
    ) {
    }

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

    /**
     * @throws \Exception
     */
    public function update(int $id, LoanUpdateDto $loanUpdateDto, array $presentKeys): int
    {
        DB::beginTransaction();
        try {
            $loan = $this->loanProvider->getById($id);
            if ($loan === null) {
                throw new ModelNotFoundException('Loan not found');
            }

            $data = $this->loanProcessor->processUpdate($loanUpdateDto, $presentKeys);

            $loan->update($data);

            DB::commit();

            return $id;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @throws \Exception
     */
    public function delete(int $id): int
    {
        DB::beginTransaction();
        try {
            $loan = $this->loanProvider->getById($id);
            if ($loan === null) {
                throw new ModelNotFoundException('Loan not found');
            }

            $loan->delete();

            DB::commit();

            return $id;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
