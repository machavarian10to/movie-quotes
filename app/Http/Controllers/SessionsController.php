<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\RedirectResponse;

class SessionsController extends Controller
{
	public function login(StorePostRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		if (!auth()->attempt($validated))
		{
			return back()->withErrors(['email'    => 'Correct your email']);
		}
		session()->regenerate();
		return redirect('/');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();

		return redirect('/');
	}
}
