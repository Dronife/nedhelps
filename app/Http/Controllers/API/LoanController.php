<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoanCreateRequest;
use App\Http\Requests\LoanUpdateRequest;
use App\Http\Service\LoanModifierService;
use App\Http\Service\LoanProviderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoanController extends Controller
{
    public function __construct(
        private readonly LoanModifierService $loanModifierService,
        private readonly LoanProviderService $loanProviderService,
    ) {
    }

    public function fetch(int $id): JsonResponse
    {
        $loan = $this->loanProviderService->fetchById($id);

        if ($loan === null) {
            return response()->json('Not found', Response::HTTP_NOT_FOUND);
        }

        return response()->json($loan);
    }

    public function create(LoanCreateRequest $request): JsonResponse
    {
        try {
            $payload = $request->toDto();

            $loan = $this->loanModifierService->create($payload);

            return response()->json($loan);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
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
            return response()->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
}
