<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // Unauthenticated Landing controller
    public function index()
    {
        return view('frontend.index');
    }

}
