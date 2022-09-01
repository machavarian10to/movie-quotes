<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuoteController::class, 'index'])->name('home');

Route::get('/movies/{movie:slug}', [MovieController::class, 'show'])
	->name('movies.show');

Route::get('/login', [SessionsController::class, 'create'])
	->middleware('guest')
	->name('login.create');

Route::post('/login', [SessionsController::class, 'store'])
	->middleware('guest')
	->name('login.store');

Route::post('/logout', [SessionsController::class, 'destroy'])
	->middleware('auth')
	->name('logout.destroy');
