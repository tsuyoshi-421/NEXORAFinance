<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Accounts::orderBy('account_id')->get()->map(function ($account) {
    return [
        'id' => $account->account_id,
        'name' => $account->name,

        // Display account_id as the account number
        'number' => $account->account_id,

        'type' => $account->account_type,
        'detail' => $account->detail_type,
        'balance' => (float) $account->balance,
        'date' => optional($account->created_at)->format('M d, Y'),
        'inactive' => false,
    ];
});

        return view('accountsdash', compact('accounts'));
    }
    public function update(Request $request, Accounts $account)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:100',
        'detail' => 'nullable|string|max:255',
        'balance' => 'required|numeric',
    ]);

    $account->update([
        'name' => $validated['name'],
        'account_type' => $validated['type'],
        'detail_type' => $validated['detail'],
        'balance' => $validated['balance'],
    ]);

    return response()->json([
        'success' => true
    ]);
}

public function destroy(Accounts $account)
{
    $account->delete();

    return response()->json([
        'success' => true
    ]);
}
public function store(Request $request)
{
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'type'    => 'required|string|max:100',
        'detail'  => 'nullable|string|max:255',
        'balance' => 'required|numeric',
    ]);

    $account = Accounts::create([
        'name' => $validated['name'],
        'account_type' => $validated['type'],
        'detail_type' => $validated['detail'],
        'balance' => $validated['balance'],
    ]);

    return response()->json([
    'success' => true,
    'account' => [
        'id' => $account->account_id,
        'name' => $account->name,
        'number' => $account->account_id,   // account_id used as display number
        'type' => $account->account_type,
        'detail' => $account->detail_type,
        'balance' => (float) $account->balance,
        'date' => optional($account->created_at)->format('M d, Y'),
        'inactive' => false,
    ]
]);
}
}
