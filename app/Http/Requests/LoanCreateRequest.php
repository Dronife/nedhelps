<?php

namespace App\Http\Requests;

use App\Http\Request\LoanCreateDto;
use Illuminate\Foundation\Http\FormRequest;

class LoanCreateRequest extends FormRequest
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
            'amount' => ['required', 'numeric', 'min:10', 'max:99999999.99'],
            'interestRate' => ['required', 'numeric', 'between:0,99.99'],
            'duration' => ['required', 'integer', 'min:1'],
        ];
    }

    public function toDto(): LoanCreateDto
    {
        $validatedData = $this->validated();

        return new LoanCreateDto(
            (float)$validatedData['amount'],
            (float)$validatedData['interestRate'],
            (int)$validatedData['duration'],
        );
    }
}
