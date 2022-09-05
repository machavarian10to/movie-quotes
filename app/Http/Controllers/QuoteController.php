<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class QuoteController extends Controller
{
	public function index(): View
	{
		return view('quote', [
			'quote' => Quote::all()->random(1)->first(),
		]);
	}

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		$quote = new Quote();
		$quote->movie_id = $request->movie_id;
		$quote->thumbnail = Storage::putFile('thumbnails', $request->file('thumbnail'));
		$quote->setTranslation('title', 'en', $request->title_en);
		$quote->setTranslation('title', 'ka', $request->title_ka);
		$quote->save();

		return redirect('/');
	}

	public function show(): View
	{
		return view('quotes.show', [
			'quotes' => Quote::all(),
		]);
	}

	public function edit(Quote $quote): View
	{
		return view('quotes.edit', [
			'quote'  => $quote,
			'movies' => Movie::all(),
		]);
	}

	public function create(): View
	{
		return view('quotes.create', [
			'movies' => Movie::all(),
		]);
	}

	public function update(StoreQuoteRequest $request, Quote $quote): RedirectResponse
	{
		if (isset($request->thumbnail))
		{
			['thumbnail'=>$request->file('thumbnail')->store('thumbnails')];
		}

		$quote->update($request->validated());

		return redirect('/');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		$quote->delete();

		return back()->with('success', 'Quote deleted');
	}
}
