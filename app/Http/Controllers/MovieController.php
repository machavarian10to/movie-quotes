<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
	public function index(Movie $movie)
	{
		return view('quotes', [
			'movie' => $movie,
		]);
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		Movie::create($request->validated());

		return redirect('/');
	}



	public function show(): View
	{
		return view('movies.show', [
			'movies' => Movie::all(),
		]);
	}

	public function edit(Movie $movie): View
	{
		return view('movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(StoreMovieRequest $request, Movie $movie): RedirectResponse
	{
		$movie->update($request->validated());
		return back()->with('success', 'Movie updated');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();

		return back()->with('success', 'Movie deleted');
	}
}
