<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SessionsController extends Controller
{
	public function create(): View
	{
		return view('sessions.create');
	}

	public function store(StorePostRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		if (!auth()->attempt($validated))
		{
			return back()->withErrors(['email'    => 'Correct your email']);
		}
		session()->regenerate();
		return redirect('/');
	}

	public function destroy(): RedirectResponse
	{
		auth()->logout();

		return redirect('/');
	}
}
