<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/company', [CompanyController::class, 'store']);
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company/{company}', [CompanyController::class, 'show']);
Route::put('/company/{company}', [CompanyController::class, 'update']);
Route::delete('/company/{company}', [CompanyController::class, 'destroy']);
