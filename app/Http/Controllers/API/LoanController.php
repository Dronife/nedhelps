<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanCreateRequest;
use App\Http\Requests\LoanUpdateRequest;
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
        try {
            $payload = $request->toDto();

            $loan = $this->loanModifierService->create($payload);

            return response()->json($loan);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }

    public function update(int $id, LoanUpdateRequest $request): JsonResponse
    {
        try {

            $payload = $request->toDto();
            $keys = $request->presentKeys();

            $loan = $this->loanModifierService->update($id, $payload, $keys);

            return response()->json($loan);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 400);
        }
    }
}
