<?php

use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuoteController::class, 'index'])->name('home');

Route::get('/login', [SessionsController::class, 'create']);
