<?php

namespace App\Http\Controllers;

use App\Models\Sell; // Import the Sell model
use App\Models\Medicine; // Import the Medicine model
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Show the list of sales.
     *
     * @return \Illuminate\View\View
     */
    public function showSales()
    {
        $sales = Sell::with('medicine')->get(); // Eager load the associated medicine
        return view('dashboards.admins.sales.showSales', compact('sales'));
    }

    /**
     * Show the form for creating a new sale.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $medicines = Medicine::all(); // Retrieve all medicines for the dropdown
        return view('dashboards.admins.sales.createSell', compact('medicines'));
    }

    /**
     * Store a newly created sale in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the medicine by ID
        $medicine = Medicine::find($request->medicine_id);

        // Check if there's enough stock available
        if ($medicine->amount < $request->quantity) {
            return redirect()->back()->with('error', 'دارو کافی موجود نیست.');
        }

        // Update the amount in the medicines table
        $medicine->amount -= $request->quantity;
        $medicine->save();

        // Record the sale
        Sell::create([
            'medicine_id' => $medicine->medicine_id,
            'quantity' => $request->quantity,
            'sell_date' => now(),
        ]);

        return redirect()->route('sell.show')->with('status', 'Sale added successfully!');
    }

   
}