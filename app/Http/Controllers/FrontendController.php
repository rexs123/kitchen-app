<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{
    public function __construct()
    {
        if (User::count() === 0) {
			redirect()->route('setup.index')->send();
        }
    }

    // Unauthenticated Landing controller
    public function index()
    {
        return view('frontend.index');
    }

}
