<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\doctor;
use App\Models\patient;

class patientController extends Controller
{
    public function show(Request $request)
    {
        $query = $request->input('query');
    
        // Only get patients with 'incomplete' status
        $patients = Patient::leftJoin('doctors', 'doctors.doctor_id', '=', 'patients.doctor_id')
            ->when($query, function ($q) use ($query) {
                return $q->where('patients.patient_name', 'like', '%' . $query . '%')
                         ->orWhere('doctors.doctor_name', 'like', '%' . $query . '%'); // Search by doctor's name
            })
            ->where('patients.status', 'incompleted') // Filter for incomplete patients
            ->select('patients.*', 'doctors.doctor_name as doctor_name') // Change alias to avoid confusion
            ->get();
    
        return view('dashboards.admins.patient.patient-show', compact('patients'));
    }
    public function add(){ 
        $doctors = doctor::all(); 
        
        return view('dashboards.admins.patient.patient-add', compact('doctors'));
    }
    public function addPatient(Request $request)
{
    $request->validate([
        'patient_name' => 'required|string|max:64',
        'lastName' => 'required|string|max:64',
        'age' => 'nullable|integer|min:0',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string',
        'blood_pressure' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'gender' => 'nullable|in:male,female,other', // Ensure gender is valid
        'doctor_id' => 'nullable|exists:doctors,doctor_id', // Check if doctor_id exists
    ]);

    $patient = new Patient();
    $patient->patient_name = $request->patient_name;
    $patient->lastName = $request->lastName;
    $patient->age = $request->age;
    $patient->phone = $request->phone;
    $patient->address = $request->address;
    $patient->blood_pressure = $request->systolic . '/' . $request->diastolic;
    $patient->medical_history = $request->medical_history;
    $patient->gender = $request->gender;
    $patient->doctor_id = $request->doctor_id;

    $patient->save();

    return redirect()->route('patient-show')->with('status', 'Patient Added Successfully!!');
}
public function patientDelete($patient_id){
    $patient = patient::find($patient_id);
    $patient->delete();
     return redirect()->route('patient-show');
} 
public function patientEdit($patient_id)
{
    $doctors = doctor::all();
    $patient = patient::find($patient_id);

    // Check if the doctor exists
    if (!$patient) {
        return redirect()->route('patient-show')->with('error', 'patient not found.');
    }

    return view('dashboards.admins.patient.patient-edit', compact('doctors', 'patient'));
}
    
public function editPatient(Request $request, $patient_id) // Accept patient_id as a parameter
{
    $request->validate([
        'patient_name' => 'required|string|max:64',
        'lastName' => 'required|string|max:64',
        'age' => 'nullable|integer|min:0',
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string',
        'blood_pressure' => 'nullable|string',
        'medical_history' => 'nullable|string',
        'gender' => 'nullable|in:male,female,other',
        'doctor_id' => 'nullable|exists:doctors,doctor_id',
    ]);

    $patient = Patient::find($patient_id); // Use the passed patient_id

    // Check if the patient exists
    if (!$patient) {
        return redirect()->route('patient-show')->with('error', 'Patient not found.');
    }

    $patient->patient_name = $request->patient_name;
    $patient->lastName = $request->lastName;
    $patient->age = $request->age;
    $patient->phone = $request->phone;
    $patient->address = $request->address;
    $patient->blood_pressure = $request->systolic . '/' . $request->diastolic;
    $patient->medical_history = $request->medical_history;
    $patient->gender = $request->gender;
    $patient->doctor_id = $request->doctor_id;

    $patient->save();
    
    return redirect()->route('patient-show')->with('status', 'Patient Edited Successfully!');
}
public function completePatient($patient_id)
{
    $patient = patient::find($patient_id);
    if ($patient) {
        $patient->status = 'complete'; // Update the status
        $patient->save();
    }

    return redirect()->route('patient-show')->with('status', 'Patient marked as complete.');
}
public function completed()
{
    $completedPatients = patient::where('status', 'complete')->get();
    return view('dashboards.admins.patient.patient-completed', compact('completedPatients'));
}
public function incompletePatient($patient_id)
{
    $patient = Patient::find($patient_id);
    if ($patient) {
        $patient->status = 'incompleted'; // Update the status
        $patient->save();
    }

    return redirect()->route('patient-show')->with('status', 'Patient marked as incomplete.');
}

public function patientsByDoctor($doctor_id)
{
    $patients = Patient::where('doctor_id', $doctor_id)->get();
    return view('dashboards.admins.doctor.patient-by-doctor', compact('patients'));
}

}


