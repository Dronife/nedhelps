<?php

use App\Http\Controllers\API\LoanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('loans')->group(function () {
    Route::post('/', [LoanController::class, 'create']);
    Route::patch('/{id}', [LoanController::class, 'update']);
    Route::get('/{id}', [LoanController::class, 'fetch']);
    Route::get('/', [LoanController::class, 'fetchAll']);
    Route::delete('/{id}', [LoanController::class, 'delete']);
});
