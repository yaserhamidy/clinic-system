<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    public function show(Request $request)
    {
        // Get the search query input for the date
        $query = $request->get('query');
    
        // Perform the query on the transactions table, joining with the accounts table
        $transactions = transaction::leftJoin('accounts', 'transactions.account_id', '=', 'accounts.account_id')
            ->when($query, function ($q) use ($query) {
                // Apply the search filter for the date field from the accounts table
                return $q->whereDate('accounts.date', '=', $query);  // assuming the query is in the format 'YYYY-MM-DD'
            })
            ->select('transactions.*', 'accounts.date') // Selecting the necessary fields
            ->get();
    
        // Return the view with the transactions data
        return view('dashboards.admins.transaction.transaction-show', compact('transactions'));
    }
    
}
