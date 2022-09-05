<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class MovieController extends Controller
{
	public function show(Movie $movie)
	{
		return view('quotes', [
			'movie' => $movie,
		]);
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		$movie = Movie::create($request->validated());
		$movie->setTranslation('name', 'en', $request->name_en);
		$movie->setTranslation('name', 'ka', $request->name_ka);
		$movie->save();

		return redirect('/');
	}

	public function index(): View
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
