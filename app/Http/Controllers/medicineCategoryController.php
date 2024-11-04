<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\medicineCategory;

class medicineCategoryController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->get('query');

        $medicineCatagories = medicineCategory::all();
    
        return view('dashboards.admins.medicineCategory.medicineCategory-show', compact('medicineCatagories'));
    }
    public function add(){  
        return view('dashboards.admins.medicineCategory.medicineCategory-add');
    }
    public function addMedicineCategory(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:1000', // Adjust max length as needed
        ]);
    
        $name = $request->name;
        $description = $request->description;
        
    
        $catagory = new medicineCategory();
        
        $catagory->name = $name;
        $catagory->description = $description;
    
        $catagory->save();
        
        return redirect()->route('medicineCategory-show')->with('status' , 'Medicine Category Added Successfully!!');
       
    }


    public function medicineCategoryDelete($medicineCat_id)
    {
        $catagory = medicineCategory::find($medicineCat_id);
        $catagory->delete();
         return redirect()->route('medicineCategory-show');
} 


public function medicineCategoryEdit($medicineCat_id){
    $catagory = medicineCategory::find($medicineCat_id);
    return view('dashboards.admins.medicineCategory.medicineCategory-edit', compact('catagory'));


}

    
public function editMedicineCategory(Request $request){
    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'description' => 'nullable|string|max:1000', // Adjust max length as needed
    ]);
    $name = $request->name;
    $description = $request->description;
    

    $catagory = medicineCategory::find($request->medicineCat_id);
    $catagory->name = $name;
    $catagory->description = $description;

    $catagory->save();
    
    // $catagories = catagory::all();
    // return view('admin.catagory.show_catagory', compact('catagories'));
    return redirect()->route('medicineCategory-show')->with('status' , 'Medicine Category Edited Successfully!!');

 }
}
