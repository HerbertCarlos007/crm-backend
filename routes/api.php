<?php

use App\Http\Controllers\ClosingReasonController;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NegotiationController;
use App\Http\Controllers\StageController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/users/{companyId}', [UserController::class, 'index']);

Route::post('/login', [UserController::class, 'login']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/company', [CompanyController::class, 'store']);
Route::get('/company', [CompanyController::class, 'index']);
Route::get('/company/{company}', [CompanyController::class, 'show']);
Route::put('/company/{company}', [CompanyController::class, 'update']);
Route::delete('/company/{company}', [CompanyController::class, 'destroy']);

Route::post('/stage', [StageController::class, 'store']);
Route::get('/stage/{companyId}', [StageController::class, 'index']);

Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/{companyId}', [CustomerController::class, 'index']);

Route::post('/negotiation', [NegotiationController::class, 'store']);
Route::get('/negotiation/{companyId}', [NegotiationController::class, 'index']);

Route::post('/closing-reason', [ClosingReasonController::class, 'store']);
Route::get('/closing-reason/{companyId}', [ClosingReasonController::class, 'index']);

Route::post('/task', [TaskController::class, 'store']);
Route::get('/task/{companyId}', [TaskController::class, 'index']);
