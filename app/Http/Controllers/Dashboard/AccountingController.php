<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\Order;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.accounting.index', [
            'orders' => Order::all(),
            'expenses' => Expense::all(),
        ]);
    }

    public function show(Request $request)
    {
        return view('dashboard.accounting.show', [
            'orders' => Order::all(),
            'expenses' => Expense::all(),
        ]);
    }
}
