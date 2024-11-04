<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    public function show(Request $request)
{
    $query = $request->get('query');
    
    // Join transactions with accounts to get the account name
    $transactions = transaction::leftJoin('accounts', 'transactions.account_id', '=', 'accounts.account_id')
        ->select('transactions.*', 'accounts.account_name') // Adjust this to match your account name column
        ->get();
    
    return view('dashboards.admins.transaction.transaction-show', compact('transactions'));
}
}
