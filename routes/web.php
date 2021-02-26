<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

// welcome
Route::get('/', function () {
    return view('welcome');
});

// home UNUSED
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified', 'password.confirm']);
// UNUSED

// projects
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/projects', [ProjectsController::class, 'index']);
    Route::get('/projects/create', [ProjectsController::class, 'create']);
    Route::get('/projects/{project}', [ProjectsController::class, 'show']);
    Route::post('/projects', [ProjectsController::class, 'store']);
});

// auth
require __DIR__.'/auth.php';
