<?php

use App\Http\Controllers\DamageController;
use Illuminate\Support\Facades\Route;


// Route::get('damages', [DamageController::class, 'index']);
// Route::post('damages', [DamageController::class, 'store']);
Route::get('/', function () {
    return view('email');
});