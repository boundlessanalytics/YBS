<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Display a list of accounts
    public function index()
    {
        $accounts = Account::all();  // Retrieve all accounts
        return view('accounts.index', compact('accounts'));
    }

    // Show the form for creating a new account
    public function create()
    {
        return view('accounts.create');
    }

    // Store a new account
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'type' => 'required|in:asset,liability,equity,income,expense',
            'balance' => 'required|numeric',
        ]);

        $account = new Account($validated);
        $account->user_id = Auth::user()->id;
        $account->save();

        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    // Show the form for editing an existing account
    public function edit($id)
    {
        $account = Account::findOrFail($id);
        return view('accounts.edit', compact('account'));
    }

    // Update an account
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'balance' => 'required|numeric',
        ]);

        $account = Account::findOrFail($id);
        $account->update($request->all());

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    // Delete an account
    public function destroy($id)
    {
        $account = Account::findOrFail($id);
        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}