<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::controller(QuoteController::class)->group(function () {
	Route::get('/', 'index')->name('home');
	Route::post('/admin/quotes', 'store')->name('admin.quotes_store')->middleware('auth');
	Route::get('/admin/quotes', 'show')->name('admin.quotes_show')->middleware('auth');
	Route::get('/admin/quotes/create', 'create')->name('admin.quotes_create')->middleware('auth');
	Route::get('/admin/quotes/{quote}/edit', 'edit')->name('admin.quotes_edit')->middleware('auth');
	Route::patch('/admin/quotes/{quote}', 'update')->name('admin.quotes_update')->middleware('auth');
	Route::delete('/admin/quotes/{quote}', 'destroy')->name('admin.quotes_destroy')->middleware('auth');
});

Route::controller(MovieController::class)->group(function () {
	Route::get('/movies/{movie:slug}', 'index')->name('movies.show');
	Route::post('/admin/movies', 'store')->name('admin.movies_store')->middleware('auth');
	Route::get('/admin/movies', 'show')->name('admin.movies_show')->middleware('auth');
	Route::get('/admin/movies/{movie}/edit', 'edit')->name('admin.movies_edit')->middleware('auth');
	Route::patch('/admin/movies/{movie}', 'update')->name('admin.movies_update')->middleware('auth');
	Route::delete('/admin/movies/{movie}', 'destroy')->name('admin.movies_destroy')->middleware('auth');
});

Route::controller(SessionsController::class)->group(function () {
	Route::get('/login', 'create')->middleware('guest')->name('login.create');
	Route::post('/login', 'store')->middleware('guest')->name('login.store');
	Route::post('/logout', 'destroy')->middleware('auth')->name('logout.destroy');
});

Route::view('/admin/movies/create', 'movies.create')
	->name('admin.movies_create')
	->middleware('auth');
