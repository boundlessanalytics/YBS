<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('debitAccount', 'creditAccount')->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $accounts = Account::all();
        return view('transactions.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'account_id' => 'required|exists:accounts,id',
            'transaction_type' => 'required|in:debit,credit',
            'amount' => 'required|numeric',
            'description' => 'nullable|string',
            'transaction_date' => 'required|date',
        ]);

        $transaction = new Transaction($validated);
        $transaction->user_id = Auth::user()->id;
        $transaction->save();

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }
}