<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/add', [DepartmentController::class, 'store']);
Route::patch('/departments/{department}', [DepartmentController::class, 'update']);
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy']);
