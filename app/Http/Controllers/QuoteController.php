<?php

namespace App\Http\Controllers;

use App\Models\Quote;

class QuoteController extends Controller
{
	public function index()
	{
		return view('quote', [
			'quote' => Quote::first(),
		]);
	}
}
