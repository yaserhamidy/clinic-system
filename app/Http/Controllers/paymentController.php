<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\patient; 
use App\Models\payment; 
use App\Models\account;
use App\Models\transaction; 

class paymentController extends Controller
{
    public function show(Request $request)
    {
        // Get the search query input
        $query = $request->input('query');
    
        // Perform the search on the `payments` table, joining with the `patients` table
        $payments = payment::leftJoin('patients', 'patients.patient_id', '=', 'payments.patient_id')
            ->when($query, function ($q) use ($query) {
                // Apply the search filter for the patient's name using the `like` operator
                return $q->where('patients.patient_name', 'like', '%' . $query . '%');
            })
            ->select('payments.*', 'patients.patient_name as name') // Select payment columns along with patient's name
            ->get();
    
        // Return the view with the payments data
        return view('dashboards.admins.payment.payment-show', compact('payments'));
    }
    

   public function add()
 {
    $patients = patient::all(); 
    $accounts = account::all(); 
    return view('dashboards.admins.payment.payment-add', compact('patients','accounts'));
 }

 public function addPayment(Request $request)
 {
     $request->validate([
         'amount' => 'required|integer',
         'date' => 'required|date',
         'patient_id' => 'required|exists:patients,patient_id',
         'account_id' => 'required|exists:accounts,account_id',
     ]);
 
     // Create the payment
     $payment = new payment();
     $payment->amount = $request->amount;  
     $payment->date = $request->date;
     $payment->patient_id = $request->patient_id;
     $payment->account_id = $request->account_id; // Ensure account_id is saved to the payment
     $payment->save();
 
     // Create the transaction
     $transaction = new transaction();
     $transaction->amount = $payment->amount; // Set the amount from the payment
     $transaction->account_id = $request->account_id; // Reference to the same account
     $transaction->payment_id = $payment->payment_id; // Reference to the payment
     $transaction->date = $payment->date; // Reference to the payment
     $transaction->created_at = now(); // Set creation timestamp
     $transaction->updated_at = now(); // Set updated timestamp
     $transaction->save();
 
     return redirect()->route('payment-show')->with('status', 'Payment Added Successfully!');
 }
    public function paymentDelete($payment_id)
    {
        $payment = payment::find($payment_id);
        $payment->delete();
        return redirect()->route('payment-show');
    }

    public function paymentEdit($payment_id)
    {
        $patients = patient::all(); 
        $payment = payment::find($payment_id);
        return view('dashboards.admins.payment.payment-edit', compact('payment','patients'));
    }

    public function editPayment(Request $request)
    {
        $request->validate([
            'payment_id' => 'required|exists:payments,payment_id',
            'amount' => 'required|integer',
            'date' => 'required|date',
            'patient_id' => 'required|exists:patients,patient_id',
        ]);
    
        // Find the payment record
        $payment = payment::find($request->payment_id);
        // Update payment details
        $payment->amount = $request->amount; 
        $payment->date = $request->date;
        $payment->patient_id = $request->patient_id;
        $payment->save();
    
        // Update the corresponding transaction
        $transaction = transaction::where('payment_id', $payment->payment_id)->first();
        if ($transaction) {
            $transaction->amount = $payment->amount; // Update the amount
            $transaction->updated_at = now(); // Update the timestamp
            $transaction->save();
        }
    
        return redirect()->route('payment-show')->with('status', 'Payment Edited Successfully!!');
    }

    public function paymentDetails($patient_id)
    {
        $payments = payment::where('patient_id', $patient_id)->get();
        $patient = patient::find($patient_id);
    
        if (!$patient) {
            return redirect()->route('payment-show')->with('error', 'Patient not found.');
        }
    
        return view('dashboards.admins.payment.payment-details', compact('payments', 'patient'));
    }

}
