<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store(StorePostRequest $request)
	{
		$validated = $request->validated();

		if (!auth()->attempt($validated))
		{
			return back()->withErrors(['email'    => 'Correct your email']);
		}
		session()->regenerate();
		return redirect('/')->with('success', 'You are logged in');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/')->with('success', 'You are logged out!');
	}
}
