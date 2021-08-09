<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;

// welcome
Route::get('/', function () {
    return view('welcome');
});

// home
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified', 'password.confirm']);

// auth
require __DIR__.'/auth.php';
