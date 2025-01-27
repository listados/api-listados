<?php

use App\Http\Controllers\UserControlPlanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('alter-plan', [UserControlPlanController::class, 'alter'])->name('api/alter-plan');

