<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account; // Ensure the model name is in PascalCase

class AccountController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->get('query');
        
        // Use the query to filter accounts
        $accounts = Account::when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('account_name', 'like', '%' . $query . '%')
                                 ->orWhere('description', 'like', '%' . $query . '%');
        })->get();

        return view('dashboards.admins.account.account-show', compact('accounts'));
    }

    public function add()
    {  
        return view('dashboards.admins.account.account-add');
    }

    public function addAccount(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000', // Adjust max length as needed
            'date' => 'required|date', // Validate date if necessary
        ]);
    
        $account = new Account();
        $account->account_name = $request->account_name;
        $account->description = $request->description;
        $account->date = $request->date;
    
        $account->save();
        
        return redirect()->route('account-show')->with('status', 'Account Added Successfully!!');
    }

    public function accountDelete($account_id)
    {
        $account = Account::find($account_id);
        if ($account) {
            $account->delete();
            return redirect()->route('account-show')->with('status', 'Account Deleted Successfully!!');
        }
        return redirect()->route('account-show')->with('error', 'Account Not Found!');
    } 

    public function accountEdit($account_id)
    {
        $account = Account::find($account_id);
        if ($account) {
            return view('dashboards.admins.account.account-edit', compact('account'));
        }
        return redirect()->route('account-show')->with('error', 'Account Not Found!');
    }

    public function editAccount(Request $request)
    {
        $request->validate([
            'account_name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000',
            'date' => 'required|date', // Validate date if necessary
        ]);

        $account = Account::find($request->account_id);
        if ($account) {
            $account->account_name = $request->account_name;
            $account->description = $request->description;
            $account->date = $request->date;

            $account->save();
            return redirect()->route('account-show')->with('status', 'Account Edited Successfully!!');
        }
        return redirect()->route('account-show')->with('error', 'Account Not Found!');
    }
}