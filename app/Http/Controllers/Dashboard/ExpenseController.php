<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        return view('dashboard.orders.index', [
            'expenses' => Expense::paginate(20)
        ]);
    }

    public function show(Expense $expense)
    {
        return view('dashboard.expenses.show', [
            'expense' => $expense
        ]);
    }

    public function create()
    {
        return view('dashboard.expenses.create');
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create([
            'fixed' => $request->fixed,
            'amount' => $request->amount,
            'proof_of_purchase' => '',
            'taxes_paid' => $request->taxes,
        ]);

        return redirect()->route('dashboard.expenses.index')->with('success', 'Expense successfully logged.');
    }

    public function update(Expense $expense, UpdateExpenseRequest $request)
    {
        // Store image and update URL field in database.

        return redirect()
            ->route('dashboard.expenses.index')
            ->with('success', 'Proof of purchase image successfully stored to expense record.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect()->route('dashboard.expenses.index')->with('success', 'Expense successfully removed.');

    }
}
