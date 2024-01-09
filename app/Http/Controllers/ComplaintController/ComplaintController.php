<?php

namespace App\Http\Controllers\ComplaintController;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaint = Complaint::all();
        return view('Complaint.complaint', [
            'complaint' => $complaint
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
    public function store(StoreComplaintRequest $request)
    {
        $complaint = new Complaint;

        // Store the uploaded file
        //$compEvidence = $request->file('compEvidence')->store('banner');

        // Set values for the Complaint model
        $complaint->compDateOccured = $request->compDateOccured;
        $complaint->compKioskNum = $request->compKioskNum;
        $complaint->compPhoneNum = $request->compPhoneNum;
        $complaint->compType = $request->compType;
        //$complaint->compEvidence = $compEvidence;

        // Save the Complaint model to the database
        $complaint->save();

        return redirect('/complaint');
    }


    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        $complaint->compDateOccured = $request->compDateOccured;
        $complaint->compKioskNum = $request->compKioskNum;
        $complaint->compPhoneNum = $request->compPhoneNum;

        $complaint->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
