<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SetupController extends Controller
{
	public function __construct()
	{
		if (User::count()) {
			return abort(404);
		}
	}

	public function index()
	{
		return view('setup.index');
	}

	public function store(SetupRequest $request)
	{
		$validated = $request->validated();
		$user = User::create([
			'first_name' => $validated['first_name'],
			'last_name' => $validated['last_name'],
			'email' => $validated['email'],
			'password' => Hash::make($validated['password'])
		]);

		Auth::login($user, $remember = true);

		return redirect('/')->with('success', 'App successfully setup.');
	}
}
