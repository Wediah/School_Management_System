<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\AssignmentsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//user
Route::get('/users', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::patch('/users/{user}', [RegisterController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/users/{user}', [RegisterController::class, 'destroy'])->middleware('auth:sanctum');

//sessions
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('can:admin')->group(function () {
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
    });
});

Route::middleware('auth:sanctum')->group(function () {
    //assignments
    Route::get('/assignments', [AssignmentsController::class, 'index']);
    Route::middleware('can:lecturer')->group(function () {
        Route::post('/addassignment', [AssignmentsController::class, 'store']);
        Route::patch('/assignments/{assignment}', [AssignmentsController::class, 'update']);
        Route::delete('/assignments/{assignment}', [AssignmentsController::class, 'destroy']);
    });

    //answers
    Route::middleware('can:student')->group(function () {
        Route::get('/answers', [AnswerController::class, 'index']);
        Route::post('/addanswer', [AnswerController::class, 'store']);
        Route::get('/answers/{answer}', [AnswerController::class, 'show']);
        Route::patch('/answers/{answer}', [AnswerController::class, 'update']);
        Route::delete('/answers/{answer}', [AnswerController::class, 'destroy']);
    });

    //grade
    Route::middleware('can:lecturer')->group(function () {
        Route::post('addgrade', [GradeController::class, 'store']);
        Route::patch('/grades/{grade}', [GradeController::class, 'update']);
        Route::delete('/grades/{grade}', [GradeController::class, 'destroy']);
    });
});


