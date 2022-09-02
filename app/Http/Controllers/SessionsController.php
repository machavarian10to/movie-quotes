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
		return redirect('/');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/');
	}
}
