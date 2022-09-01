<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function show(Movie $movie)
	{
		return view('quotes', [
			'movie' => $movie,
		]);
	}
}
