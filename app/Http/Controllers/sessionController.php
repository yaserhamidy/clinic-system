<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\session; 
use App\Models\patient; 

class SessionController extends Controller
{
    public function show(Request $request)
{
    $query = $request->input('query');

    $sessions = session::leftJoin('patients', 'patients.patient_id', '=', 'sessions.patient_id')
    ->when($query, function ($q) use ($query) {
        return $q->where('sessions.session_name', 'like', '%' . $query . '%');
    })
    ->select('sessions.*', 'patients.patient_name as name')->get();
    return view('dashboards.admins.session.session-show', compact('sessions'));
}

    public function add()
    {
        $patients = patient::all(); 
        return view('dashboards.admins.session.session-add', compact('patients'));
    }

    public function addSession(Request $request)
    {
        $request->validate([
            'session_name' => 'required|string|min:3|max:64',
            'description' => 'nullable|string|max:256',
            'patient_id' => 'nullable|exists:patients,patient_id',
        ]);

        $session = new session();
        $session->session_name = $request->session_name;  // Match with form input name
        $session->description = $request->description;
        $session->patient_id = $request->patient_id;

        $session->save();

        return redirect()->route('session-show')->with('status', 'Session Added Successfully!!');
    }

    public function sessionDelete($session_id)
    {
        $session = Session::find($session_id);
        $session->delete();
        return redirect()->route('session-show');
    }

    public function sessionEdit($session_id)
    {
        $patients = patient::all(); 
        $session = Session::find($session_id);
        return view('dashboards.admins.session.session-edit', compact('session','patients'));
    }

    public function editSession(Request $request)
    {
        $request->validate([
            'session_name' => 'required|string|min:3|max:64',
            'description' => 'nullable|string|max:256',
            'patient_id' => 'nullable|exists:patients,patient_id',
        ]);

        $session = Session::find($request->session_id);
        $session->session_name = $request->session_name;
        $session->description = $request->description;
        $session->patient_id = $request->patient_id;

        $session->save();

        return redirect()->route('session-show')->with('status', 'Session Edited Successfully!!');
    }


    public function sessionDetails($patient_id)
{
    $sessions = session::where('patient_id', $patient_id)->get();
    $patient = patient::find($patient_id);

    if (!$patient) {
        return redirect()->route('session-show')->with('error', 'Patient not found.');
    }

    return view('dashboards.admins.session.session-details', compact('sessions', 'patient'));
}
}