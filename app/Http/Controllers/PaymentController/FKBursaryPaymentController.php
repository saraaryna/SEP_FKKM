<?php

namespace App\Http\Controllers\PaymentController;

use App\Models\User;
use App\Models\Payment;
use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFKBursaryPayment;
use App\Http\Requests\UpdateFKBursaryPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class FKBursaryPaymentController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();

        if ($user) {
            $payment = Payment::get();
            $application = Application::get();

            return view('Payment.FKBursaryPayment',[
                'payment' => $payment,
                'user' => $user,
                'users' => $users,
                'application' => $application,


            ]);
        }else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('home');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPayment()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function savePayment(StoreFKBursaryPayment $request)
    {
        $user = Auth::user();

        if ($user) {
            $payment = new Payment;
            // Store the uploaded file
            //$compEvidence = $request->file('compEvidence')->store('banner');

            // Set values for the payment model
            $payment->userID = $request->userID;
            $payment->appID = $request->appID;
            $payment->payFor = $request->payFor;
            $payment->payFeeType = $request->payFeeType;
            $payment->payFeeTotal = $request->payFeeTotal;
            $payment->payKioskNum = $request->payKioskNum;
            $payment->payEmail = $request->payEmail;
            $payment->payRemarks = $request->payRemarks;
            $payment->payProof = $request->payProof;
            $payment->payDate = $request->payDate;

            // Save the payment model to the database
            $payment->save();

            return redirect()->route('FKBursaryPayment');

        }else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('home');
        }

    }
    /**
     * Update the specified resource in storage.
     */
    public function viewPayment(UpdateFKBursaryPayment $request, Payment $payment,$payID)
    {
        $user = Auth::user();

        if ($user) {
            // Find the existing payment by payID
            $payment = Payment::findOrFail($payID);
    
            // Set updated values for the payment model
            $payment->userID = $request->userID;
            $payment->appID = $request->appID;
            $payment->payFor = $request->payFor;
            $payment->payFeeType = $request->payFeeType;
            $payment->payFeeTotal = $request->payFeeTotal;
            $payment->payKioskNum = $request->payKioskNum;
            $payment->payEmail = $request->payEmail;
            $payment->payRemarks = $request->payRemarks;
            $payment->payProof = $request->payProof;
            $payment->payDate = $request->payDate;
    
            // Save the updated payment model to the database
            $payment->save();
    
            return redirect()->route('printFKBursaryPayment', ['payID' => $payment->payID]);
        } else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function remindParticipant(Payment $payment)
    {
        //
    }

    public function createReceipt(Payment $payment, $payID)
    {
        // Fetch the payment data for printing
        $payment = Payment::findOrFail($payID);

        // Pass payment data to the view
        return view('print-receipt', ['payment' => $payment]);
    }

    public function generateReceipt(Payment $payment, $payID)
    {
        return redirect()->route('FKBursaryPayment');
    }
}
