<?php

namespace App\Http\Requests;

use App\Http\Request\LoanUpdateDto;
use Illuminate\Foundation\Http\FormRequest;

class LoanUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' => ['sometimes', 'numeric', 'min:10', 'max:99999999.99'],
            'interestRate' => ['sometimes', 'numeric', 'between:0,99.99'],
            'duration' => ['sometimes', 'integer', 'min:1'],
        ];
    }

    public function toDto(): LoanUpdateDto
    {
        $validatedData = $this->validated();

        return new LoanUpdateDto(
            isset($validatedData['amount']) ? (float)$validatedData['amount'] : null,
            isset($validatedData['interestRate']) ? (float)$validatedData['interestRate'] : null,
            isset($validatedData['duration']) ? (int)$validatedData['duration'] : null,
        );
    }

    /**
     * @return string[]
     */
    public function presentKeys(): array
    {
        return array_keys($this->validated());
    }
}
