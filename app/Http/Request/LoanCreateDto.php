<?php

declare(strict_types=1);

namespace App\Http\Request;

class LoanCreateDto
{
    public function __construct(
        public readonly float $amount,
        public readonly float $interestRate,
        public readonly int $duration,
    ) {
    }

    /**
     * @return array<string, float|int>
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
