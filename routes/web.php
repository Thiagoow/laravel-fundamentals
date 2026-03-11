<?php

use App\Http\Controllers\Auth\Logout;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

Route::get('/', [ChirpController::class, 'index']);
Route::resource('chirps', ChirpController::class)->except(['index', 'create', 'show']);

Route::view('/register', 'auth.register')->middleware('guest');
Route::post('/register', Register::class)->middleware('guest');
