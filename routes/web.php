<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('start');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::get('/subjects', [SubjectController::class, 'index'])->middleware('auth');
Route::get('/subjects/create', [SubjectController::class, 'create'])->middleware('auth');
Route::post('subjects', [SubjectController::class, 'store'])->middleware("auth");
Route::delete('subjects/{subject}', [SubjectController::class, 'destroy'])->middleware("auth");
Route::get('subjects/{subject}/edit', [SubjectController::class, 'edit'])->middleware("auth");
Route::put('subjects/{subject}', [SubjectController::class, 'update'])->middleware("auth");

Route::get('/grades', [GradeController::class, 'index'])->middleware('auth');
Route::get('/grades/create', [GradeController::class, 'create'])->middleware('auth');
Route::post('grades', [GradeController::class, 'store'])->middleware("auth");
Route::delete('grades/{grade}', [GradeController::class, 'destroy'])->middleware("auth");
Route::get('grades/{grade}/edit', [GradeController::class, 'edit'])->middleware("auth");
Route::put('grades/{grade}', [GradeController::class, 'update'])->middleware("auth");

Route::get('/login', [SessionController::class, "create"])->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])->middleware('guest');
Route::get('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::get('profile', [UsersController::class, 'index'])->middleware('auth');
Route::put('profile', [UploadController::class, 'update'])->middleware('auth');