<?php

declare(strict_types=1);

namespace App\Http\Request;

class LoanUpdateDto
{
    public function __construct(
        public readonly ?float $amount = null,
        public readonly ?float $interestRate = null,
        public readonly ?int $duration = null,
    ) {
    }

    /**
     * @return array<string, float|int|null>
     */
    public function toArray() :array
    {
        return [
            'amount' => $this->amount,
            'interestRate' => $this->interestRate,
            'duration' => $this->duration,
        ];
    }
}
