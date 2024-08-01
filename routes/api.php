<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use App\Http\Controllers\DamageController;
use App\Http\Controllers\InspectionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Inspections
Route::get('/inspections', [InspectionController::class, 'index']);
Route::post('/inspections', [InspectionController::class, 'store']);
Route::get('/inspections/{id}', [InspectionController::class, 'get']);
Route::put('/inspections/{id}', [InspectionController::class, 'update']);
Route::delete('/inspections/{id}', [InspectionController::class, 'destroy']);

// Damage
Route::get('damages', [DamageController::class, 'index']);
Route::post('damages', [DamageController::class, 'store']);
Route::get('damages/{inspectionId}', [DamageController::class, 'getDamagesByInspectionId']);

// Customers
Route::get('customers', [CustomerController::class, 'index']);
Route::post('customers', [CustomerController::class, 'store']);
Route::get('customers/{inspectionId}', [CustomerController::class, 'getCustomersByInspectionId']);

// Send PDF
Route::post('/send-pdf', [InspectionController::class, 'sendPdf']);

