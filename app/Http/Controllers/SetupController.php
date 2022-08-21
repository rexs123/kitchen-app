<?php

namespace App\Http\Controllers;

use App\Http\Requests\SetupRequest;
use App\Models\User;

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
		$user = User::create($validated);

		return redirect('/');
	}

}
