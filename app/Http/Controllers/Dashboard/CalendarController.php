<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.calendar.index', [
            'orders' => Order::with(['customer', 'products']),
        ]);
    }
}
