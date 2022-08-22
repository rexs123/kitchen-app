<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FrontendController extends Controller
{
    // Unauthenticated Landing controller
    public function index()
    {
        if (!User::count()) {
            return redirect()->route('setup.index')->send();
        }

        return view('frontend.index');
    }

}
