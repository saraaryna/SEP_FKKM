<?php

namespace App\Http\Controllers\PaymentController;

use App\Models\User;
use App\Models\Payment;
use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class kpPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            $payment = Payment::where('userID', $user->userID)->get();
            $application = Application::where('userID', $user->userID)->first();
            $totalPayment = $user->payment()->sum('payFeeTotal');
            $totalInvoice = '3700.00';
            $totalCredit = $totalPayment - $totalInvoice;
            $balances = $totalInvoice - $totalPayment;

            return view('Payment.kpPayment',[
                'payment' => $payment,
                'user' => $user,
                'application' => $application,
                'totalPayment' => $totalPayment,
                'totalInvoice' => $totalInvoice,
                'totalCredit' => $totalCredit,
                'balances' => $balances,


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
    public function savePayment(StorePaymentRequest $request)
    {
        $user = Auth::user();

        $application = Application::find(1);
        $payment = new Payment;
        $payment1 = Payment::all();
        // Store the uploaded file
        //$compEvidence = $request->file('compEvidence')->store('banner');

        // Set values for the payment model
        $payment->userID = $user->userID;
        $payment->appID = $application->appID;
        $payment->payFor = $request->payFor;
        $payment->payFeeType = $request->payFeeType;
        $payment->payFeeTotal = $request->payFeeTotal;
        $payment->payKioskNum = $request->payKioskNum;
        $payment->payuserEmail = $request->payuserEmail;
        $payment->payRemarks = $request->payRemarks;
        $payment->payProof = $request->payProof;
        $payment->payDate = $request->payDate;

        // Save the payment model to the database
        $payment->save();

        return redirect()->route('kpPayment');
    }

    public function indexInvoice()
    {
        $user = Auth::user();

        if ($user) {
            $payment = Payment::where('userID', $user->userID)->get();
            $application = Application::where('userID', $user->userID)->first();

            return view('Payment.kpInvoice',[
                'payment' => $payment,
                'user' => $user,
                'application' => $application,


            ]);
        }else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('home');
        }

    }

}
