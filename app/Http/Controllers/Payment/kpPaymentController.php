<?php

namespace App\Http\Controllers\Payment;

use App\Models\User;
use App\Models\Payment;
use App\Models\Application;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;

class kpPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userID = "1";
        $payment = Payment::all();
        $user = User::find($userID);
        $application = Application::find($userID);
       return view('Payment.kpPayment',[
           'payment' => $payment,
           'user' => $user,
           'application' => $application,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentRequest $request)
    {
        $user = User::find(1);
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
        $payment->payEmail = $request->payEmail;
        $payment->payRemarks = $request->payRemarks;
        $payment->payProof = $request->payProof;
        $payment->payDate = $request->payDate;

        // Save the payment model to the database
        $payment->save();

        return view('Payment.kpPayment',[
            'payment' => $payment1,
            'user' => $user,
            'application' => $application,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
