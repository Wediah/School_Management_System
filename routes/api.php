<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user
Route::get('/users', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::patch('/users/{user}', [RegisterController::class, 'update']);
Route::delete('/users/{user}', [RegisterController::class, 'destroy']);

//sessions
Route::post('login', [RegisterController::class, 'store']);
Route::post('logout', [RegisterController::class, 'destroy']);

//department
Route::get('/departments', [DepartmentController::class, 'index']);
Route::post('/add', [DepartmentController::class, 'store']);
Route::patch('/departments/{department}', [DepartmentController::class, 'update']);
Route::delete('/departments/{department}', [DepartmentController::class, 'destroy']);

//role
Route::get('/roles', [RoleController::class, 'index']);
Route::post('/addrole', [RoleController::class, 'store']);
Route::delete('/roles/{role}', [RoleController::class, 'destroy']);

//status
Route::get('/status', [StatusController::class, 'index']);
Route::post('/addstatus', [StatusController::class, 'store']);
Route::delete('/status/{status}', [StatusController::class, 'destroy']);

//program
Route::get('/programs', [ProgramController::class, 'index']);
Route::post('/addprogram', [ProgramController::class, 'store']);
Route::delete('/programs/{program}', [ProgramController::class, 'destroy']);
