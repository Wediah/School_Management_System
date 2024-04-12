<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//department
Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/add', [DepartmentController::class, 'store']);
Route::patch('/departments/{department}', [DepartmentController::class, 'update']);
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy']);

//role
Route::get('/roles', [RoleController::class, 'index']);
Route::post('/addrole', [RoleController::class, 'store']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy']);
