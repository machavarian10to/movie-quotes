<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [QuoteController::class, 'index'])
	->name('home');

Route::get('/admin/quotes/create', [QuoteController::class, 'create'])
	->name('admin.quotes_create')
	->middleware('auth');

Route::post('/admin/quotes', [QuoteController::class, 'store'])
	->name('admin.quotes_store')
	->middleware('auth');

Route::get('/admin/quotes', [QuoteController::class, 'show'])
	->name('admin.quotes_show')
	->middleware('auth');

Route::get('/admin/quotes/{quote}/edit', [QuoteController::class, 'edit'])
	->name('admin.quotes_edit')
	->middleware('auth');

Route::patch('/admin/quotes/{quote}', [QuoteController::class, 'update'])
	->name('admin.quotes_update')
	->middleware('auth');

Route::delete('/admin/quotes/{quote}', [QuoteController::class, 'destroy'])
	->name('admin.quotes_destroy')
	->middleware('auth');

Route::get('/movies/{movie:slug}', [MovieController::class, 'index'])
	->name('movies.show');

Route::get('/admin/movies/create', [MovieController::class, 'create'])
	->name('admin.movies_create')
	->middleware('auth');

Route::post('/admin/movies', [MovieController::class, 'store'])
	->name('admin.movies_store')
	->middleware('auth');

Route::get('/admin/movies', [MovieController::class, 'show'])
	->name('admin.movies_show')
	->middleware('auth');

Route::get('/admin/movies/{movie}/edit', [MovieController::class, 'edit'])
	->name('admin.movies_edit')
	->middleware('auth');

Route::patch('/admin/movies/{movie}', [MovieController::class, 'update'])
	->name('admin.movies_update')
	->middleware('auth');

Route::delete('/admin/movies/{movie}', [MovieController::class, 'destroy'])
	->name('admin.movies_destroy')
	->middleware('auth');

Route::get('/login', [SessionsController::class, 'create'])
	->middleware('guest')
	->name('login.create');

Route::post('/login', [SessionsController::class, 'store'])
	->middleware('guest')
	->name('login.store');

Route::post('/logout', [SessionsController::class, 'destroy'])
	->middleware('auth')
	->name('logout.destroy');
