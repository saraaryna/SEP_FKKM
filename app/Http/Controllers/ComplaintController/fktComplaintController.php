<?php

namespace App\Http\Controllers\ComplaintController;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;

class fktComplaintController extends Controller
{
    public function index()
    {
        $complaint = Complaint::all();
        $user = User::find(1);
        return view('Complaint.fktComplaint', [
            'complaint' => $complaint,
            'user' => $user,
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
        $complaint= Complaint::find($complaint->complaintID);
        $complaint->compPIC = $request->compPIC;
        $complaint->compStatus = $request->compStatus;
        $complaint->update();
        return redirect('/fktComplaint');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect('/fktComplaint');

    }
}
