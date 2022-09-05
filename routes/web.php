<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::controller(QuoteController::class)->group(function () {
	Route::get('/', 'index')->name('home');
	Route::middleware('auth')->group(function () {
		Route::post('/admin/quotes', 'store')->name('admin.quotes_store');
		Route::get('/admin/quotes', 'show')->name('admin.quotes_show');
		Route::get('/admin/quotes/create', 'create')->name('admin.quotes_create');
		Route::get('/admin/quotes/{quote}/edit', 'edit')->name('admin.quotes_edit');
		Route::patch('/admin/quotes/{quote}', 'update')->name('admin.quotes_update');
		Route::delete('/admin/quotes/{quote}', 'destroy')->name('admin.quotes_destroy');
	});
});

Route::controller(MovieController::class)->group(function () {
	Route::get('/movies/{movie:slug}', 'show')->name('movies.show');
	Route::middleware('auth')->group(function () {
		Route::post('/admin/movies', 'store')->name('admin.movies_store');
		Route::get('/admin/movies', 'index')->name('admin.movies_show');
		Route::get('/admin/movies/{movie}/edit', 'edit')->name('admin.movies_edit');
		Route::patch('/admin/movies/{movie}', 'update')->name('admin.movies_update');
		Route::delete('/admin/movies/{movie}', 'destroy')->name('admin.movies_destroy');
	});
});

Route::controller(SessionsController::class)->group(function () {
	Route::post('/login', 'login')->middleware('guest')->name('login.store');
	Route::post('/logout', 'logout')->middleware('auth')->name('logout.destroy');
});

Route::view('/admin/movies/create', 'movies.create')
	->name('admin.movies_create')
	->middleware('auth');

Route::view('/login', 'sessions.create')
	->name('login.create')
	->middleware('guest');

Route::get('/change-locale/{locale}', [LanguageController::class, 'change'])->name('locale.change');
