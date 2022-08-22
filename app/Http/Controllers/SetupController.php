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
		$user = User::create([
			'first_name' => $request->first_name,
			'last_name' => $request->last_name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
		]);

		Auth::login($user, true);

		return redirect('/dashboard')->with('success', 'App successfully setup.');
	}
}
