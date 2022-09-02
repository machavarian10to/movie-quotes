<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
	public function index(Movie $movie)
	{
		return view('quotes', [
			'movie' => $movie,
		]);
	}

	public function create()
	{
		return view('movies.create');
	}

	public function store(StoreMovieRequest $request)
	{
		Movie::create($request->validated());

		return redirect('/');
	}

	public function show()
	{
		return view('movies.show', [
			'movies' => Movie::all(),
		]);
	}

	public function edit(Movie $movie)
	{
		return view('movies.edit', [
			'movie' => $movie,
		]);
	}

	public function update(StoreMovieRequest $request, Movie $movie)
	{
		$movie->update($request->validated());
		return back()->with('success', 'Movie updated');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();

		return back()->with('success', 'Movie deleted');
	}
}
