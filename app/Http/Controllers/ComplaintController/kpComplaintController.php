<?php

namespace App\Http\Controllers\ComplaintController;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use Illuminate\Support\Facades\Auth;


class kpComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        if ($user) {
            $complaint = Complaint::where('userID', $user->userID)->get();
            return view('Complaint.kpComplaint', [
                'complaint' => $complaint,
                'user' => $user,
            ]);
        } else {
            // If the user is not logged in, redirect them to the login page
            return redirect()->route('home');
        }
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
        $user = Auth::user();

        // Store the uploaded file
        //$compEvidence = $request->file('compEvidence')->store('banner');

        // Set values for the Complaint model
        $complaint->userID = $user->userID;;
        $complaint->compName = $request->compName;
        $complaint->compDate = $request->compDate;
        $complaint->compDateOccured = $request->compDateOccured;
        $complaint->compKioskNum = $request->compKioskNum;
        $complaint->compPhoneNum = $request->compPhoneNum;
        $complaint->compType = $request->compType;
        $complaint->compDescription = $request->compDescription;
        $complaint->compStatus = $request->compStatus;
        $complaint->compPIC = $request->compPIC;
        $complaint->compEvidence = $request->compEvidence;
        //$complaint->compEvidence = $compEvidence;

        // Save the Complaint model to the database
        $complaint->save();

        return redirect('/kpComplaint');
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

        $complaint->complaintID = $request->complaintID;
        $complaint = Complaint::find($complaint->complaintID);
        $complaint->compName = $request->compName;
        $complaint->compDateOccured = $request->compDateOccured;
        $complaint->compKioskNum = $request->compKioskNum;
        $complaint->compPhoneNum = $request->compPhoneNum;
        $complaint->compType = $request->compType;
        $complaint->compDescription = $request->compDescription;
        $complaint->update();
        return redirect('/kpComplaint');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        // Find the Kiosk record based on $kioskID
        $complaint = Complaint::find($complaint);

    if (!$complaint) {
        // Optionally, handle the case where the Kiosk record is not found
        return redirect()->back()->with('error', 'Complaint not found');
    }

    // Delete the Kiosk record
    $complaint->delete();

    // Optionally, redirect the user after the deletion
    return redirect()->route('/kpComplaint');
    }
}
