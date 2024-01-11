<?php

namespace App\Http\Controllers\ComplaintController;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\User;
use App\Http\Requests\UpdateComplaintRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class fktComplaintController extends Controller
{
    public function index(Request $request)
    {


        $user = $request->user();
        $complaint = Complaint::all();

            return view('Complaint.fktComplaint', [
                'complaint' => $complaint,
                'user' => $user,
            ]);
    }
    

    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        
        $complaint->complaintID = $request->complaintID;
        $complaint= Complaint::find($complaint->complaintID);
        $complaint->compPIC = $request->compPIC;
        $complaint->compStatus = $request->compStatus;
        $complaint->update();
        return redirect('/fktComplaint');
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('Complaint.fktProfile',[
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request)
    {
    $user = $request->user();

    // Validate the form data (customize validation rules as needed)
    $request->validate([
        'userName' => 'required|string|max:255',
        'userIC' => 'required|string|max:20',
        'email' => 'required|email|max:255',
        'userAddress' => 'required|string|max:255',
        'userPhoneNum' => 'required|string|max:20',
    ]);

    // Update user profile
    $user->update([
        'userName' => $request->input('userName'),
        'userIC' => $request->input('userIC'),
        'email' => $request->input('email'),
        'userAddress' => $request->input('userAddress'),
        'userPhoneNum' => $request->input('userPhoneNum'),
    ]);

    return redirect()->route('fkt-profile');
    }

 
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();

        return redirect('/fktComplaint');

    }
}
