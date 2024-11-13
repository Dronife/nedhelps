<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanCreateRequest;
use App\Http\Service\LoanModifierService;
use Illuminate\Http\JsonResponse;

class LoanController extends Controller
{
    public function __construct(
        private readonly LoanModifierService $loanModifierService,
    ) {
    }

    public function create(LoanCreateRequest $request): JsonResponse
    {
        $payload = $request->toDto();

        $loan = $this->loanModifierService->create($payload);

        return response()->json($loan);
    }
}
