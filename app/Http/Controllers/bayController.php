<?php

namespace App\Http\Controllers;

use App\Models\Purchase; // Import the Purchase model
use Illuminate\Http\Request;

class bayController extends Controller
{
    /**
     * Show the list of purchases.
     *
     * @return \Illuminate\View\View
     */
    public function showPurchases()
    {
        $purchases = Purchase::with('medicine')->get(); // Eager load the associated medicine
        return view('dashboards.admins.purchases.showPurchases', compact('purchases'));
    }
}