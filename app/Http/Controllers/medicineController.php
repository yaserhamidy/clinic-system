<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\MedicineCategory; 
use App\Models\Purchase;

class medicineController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');

        $medicines = Medicine::leftJoin('medicine_categories', 'medicine_categories.medicineCat_id', '=', 'medicines.medicineCat_id')
            ->when($query, function ($q) use ($query) {
                return $q->where('medicines.medicine_name', 'like', '%' . $query . '%');
            })
            ->select('medicines.*', 'medicine_categories.name as category_name') // Adjust as needed
            ->get();

        return view('dashboards.admins.medicine.medicine-show', compact('medicines'));
    }

    public function add()
    {
        $categories = MedicineCategory::all(); // Fetch medicine categories
        return view('dashboards.admins.medicine.medicine-add', compact('categories'));
    }

    public function addMedicine(Request $request)
    {
        $request->validate([
            'medicine_name' => 'required|string|max:64',
            'amount' => 'required|integer',
            'description' => 'nullable|string|max:256',
            'date' => 'required|date',
            'medicineCat_id' => 'required|exists:medicine_categories,medicineCat_id', // Ensure the category exists
        ]);

        $medicine = new Medicine();
        $medicine->medicine_name = $request->medicine_name;
        $medicine->amount = $request->amount;
        $medicine->description = $request->description;
        $medicine->date = $request->date;
        $medicine->medicineCat_id = $request->medicineCat_id;

        $medicine->save();

        return redirect()->route('medicine-show')->with('status', 'Medicine Added Successfully!!');
    }

    public function medicineDelete($medicine_id)
    {
        $medicine = Medicine::find($medicine_id);
        if ($medicine) {
            $medicine->delete();
        }
        return redirect()->route('medicine-show');
    }

    public function medicineEdit($medicine_id)
    {
        $categories = MedicineCategory::all();
        $medicine = Medicine::find($medicine_id);

        // Check if the medicine exists
        if (!$medicine) {
            return redirect()->route('medicine-show')->with('error', 'Medicine not found.');
        }

        return view('dashboards.admins.medicine.medicine-edit', compact('medicine', 'categories'));
    }

    public function editMedicine(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'medicine_name' => 'required|string|max:64',
            'amount' => 'required|integer',
            'description' => 'nullable|string|max:256',
            'date' => 'required|date',
            'medicineCat_id' => 'required|exists:medicine_categories,medicineCat_id', // Ensure the category exists
        ]);

        $medicine = Medicine::find($request->medicine_id);

        // Check if the medicine exists
        if (!$medicine) {
            return redirect()->route('medicine-show')->with('error', 'Medicine not found.');
        }

        $medicine->medicine_name = $request->medicine_name;
        $medicine->amount = $request->amount;
        $medicine->description = $request->description;
        $medicine->date = $request->date;
        $medicine->medicineCat_id = $request->medicineCat_id;

        $medicine->save();

        return redirect()->route('medicine-show')->with('status', 'Medicine Edited Successfully!');
    }

     /**
     * Show the form for buying medicine.
     */
    public function showBuyForm()
    {
        $medicines = Medicine::all(); // Fetch all medicines to display
        return view('dashboards.admins.purchases.buy', compact('medicines'));
    }

    /**
     * Handle the medicine purchase.
     */
    public function buyMedicine(Request $request)
    {
        $request->validate([
            'medicine_id' => 'required|exists:medicines,medicine_id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Find the medicine by ID
        $medicine = Medicine::find($request->medicine_id);

        // Check if there's enough stock available
        // if ($medicine->amount) {
        //     return redirect()->back()->with('error', 'Not enough stock available.');
        // }

        // Update the amount in the medicines table
        $medicine->amount += $request->quantity;
        $medicine->save();

        // Record the purchase
        Purchase::create([
            'medicine_id' => $medicine->medicine_id,
            'quantity' => $request->quantity,
            'purchase_date' => now(),
        ]);

        return redirect()->route('medicine-show')->with('status', 'Medicine purchased successfully!');
    }

  
}
