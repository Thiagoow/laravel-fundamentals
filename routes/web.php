<?php

use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);
Route::resource('chirps', ChirpController::class)->except(['index', 'create', 'show']);

Route::view('/register', 'auth.register')->middleware('guest');
Route::post('/register', Register::class)->middleware('guest');
Route::post('/logout', Logout::class)->middleware('auth');
