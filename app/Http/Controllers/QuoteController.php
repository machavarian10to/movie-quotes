<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Models\Quote;
use Illuminate\Support\Facades\Storage;

class QuoteController extends Controller
{
	public function index()
	{
		$quote = Quote::all()->random(1)->first();

		return view('quote', [
			'quote' => $quote,
		]);
	}

	public function create()
	{
		return view('quotes.create');
	}

	public function store(StoreQuoteRequest $request)
	{
		$attributes = $request->validated();
		$attributes['thumbnail'] = Storage::putFile('thumbnails', $request->file('thumbnail'));
		Quote::create($attributes);

		return redirect('/');
	}

	public function show()
	{
		return view('quotes.show', [
			'quotes' => Quote::all(),
		]);
	}

	public function edit(Quote $quote)
	{
		return view('quotes.edit', [
			'quote' => $quote,
		]);
	}

	public function update(StoreQuoteRequest $request, Quote $quote)
	{
		if (isset($request->thumbnail))
		{
			['thumbnail'=>$request->file('thumbnail')->store('thumbnails')];
		}

		$quote->update($request->validated());

		return redirect('/');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back()->with('success', 'Quote deleted');
	}
}
