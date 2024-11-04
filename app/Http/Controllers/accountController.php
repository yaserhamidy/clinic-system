<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class accountController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->get('query');
        $accounts = account::all();
    
        return view('dashboards.admins.account.account-show', compact('accounts'));
    }
    public function add(){  
        return view('dashboards.admins.account.account-add');
    }
    public function addAccount(Request $request){
        $request->validate([
            'account_name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000', // Adjust max length as needed
        ]);
    
        $account_name = $request->account_name;
        $description = $request->description;
        $date = $request->date;
        
    
        $account = new account();
        
        $account->account_name = $account_name;
        $account->description = $description;
        $account->date = $date;
    
        $account->save();
        
        return redirect()->route('account-show')->with('status' , 'account Added Successfully!!');
       
    }


    public function accountDelete($account_id){
        $account = account::find($account_id);
        $account->delete();
         return redirect()->route('account-show');
} 


public function accountEdit($account_id){
    $account = account::find($account_id);
    return view('dashboards.admins.account.account-edit', compact('account'));


}

    
public function editAccount(Request $request){
    $account_name = $request->account_name;
    $description = $request->description;
    $date = $request->date;
    

    $account = account::find($request->account_id);
    $account->account_name = $account_name;
    $account->description = $description;
    $account->date = $date;

    $account->save();
    
    return redirect()->route('account-show')->with('status' , 'Account Edited Successfully!!');

}

}
