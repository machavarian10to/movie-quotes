<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|email',
			'password' => 'required',
		]);

		if (!auth()->attempt($attributes))
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
