<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EnterpriseController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para listar, crear, actualizar y eliminar empresas
Route::get('/enterprises', [EnterpriseController::class, 'list']);
Route::post('/enterprises/create', [EnterpriseController::class, 'store']);
Route::put('/enterprises/update/{id}', [EnterpriseController::class, 'update']);
Route::delete('/enterprises/delete/{id}', [EnterpriseController::class, 'delete']);
