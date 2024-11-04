<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\category;

class DoctorController extends Controller
{
    public function show(Request $request)
{
    $query = $request->input('query');

    $doctors = doctor::leftJoin('categories', 'categories.cat_id', '=', 'doctors.cat_id')
        ->when($query, function ($q) use ($query) {
            return $q->where('doctors.doctor_name', 'like', '%' . $query . '%')
                     ->orWhere('doctors.lastName', 'like', '%' . $query . '%')
                     ->orWhere('categories.name', 'like', '%' . $query . '%');
        })
        ->select('doctors.*', 'categories.name as category_name')
        ->get();

    return view('dashboards.admins.doctor.doctor-show', compact('doctors'));
}
    public function add(){ 
        $catagory = category::all(); 
        
        return view('dashboards.admins.Doctor.doctor-add', compact('catagory'));
    }
    public function addDoctor(Request $request){
  
    
        $doctor_name = $request->doctor_name;
        $lastName = $request->lastName;
        $description = $request->description;
        $cat_id = $request->cat_id;
        
    
        
        $doctor = new doctor();
        $doctor->doctor_name = $doctor_name;
        $doctor->lastName = $lastName;
        $doctor->description = $description;
        $doctor->cat_id = $cat_id;
    
        $doctor->save();

        return redirect()->route('doctor-show')->with('status' , 'Doctor Added Successfully!!');
       
    }
    public function doctorDelete($doctor_id){
        $doctor = doctor::find($doctor_id);
        $doctor->delete();
         return redirect()->route('doctor-show');
} 

public function doctorEdit($doctor_id)
{
    $catagory = category::all();
    $doctor = doctor::find($doctor_id);

    // Check if the doctor exists
    if (!$doctor) {
        return redirect()->route('doctor-show')->with('error', 'Doctor not found.');
    }

    return view('dashboards.admins.Doctor.doctor-edit', compact('doctor', 'catagory'));
}
    
    public function editDoctor(Request $request){
    $request->validate([
        'doctor_name' => 'required|string|max:255',
        'lastName' => 'required|string|max:255',
        'description' => 'nullable|string',
        'cat_id' => 'required|integer',
    ]);

    $doctor = doctor::find($request->doctor_id);

    // Check if the doctor exists
    if (!$doctor) {
        return redirect()->route('doctor-show')->with('error', 'Doctor not found.');
    }

    $doctor->doctor_name = $request->doctor_name;
    $doctor->lastName = $request->lastName;
    $doctor->description = $request->description;
    $doctor->cat_id = $request->cat_id;

    $doctor->save();
    
    return redirect()->route('doctor-show')->with('status', 'Doctor Edited Successfully!');
}

}
