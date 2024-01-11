<?php

namespace App\Http\Controllers\ApplicationController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreApplicationRequest;
use App\Models\Application;
use App\Models\Complaint;
use App\Models\Kiosk;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class kpApplicationController extends Controller
{
    public function showDashboard(Request $request)
    {
        $user = $request->user();
        $application = Application::all();
        $totalUsers = User::count();
        $totalApp = Application::count();
        $totalKiosk = Kiosk::count();
        $totalComplaint = Complaint::count();

        $userRoles = User::groupBy('userRole')->pluck('userRole');
        $userCounts = User::groupBy('userRole')->selectRaw('count(*) as total')->pluck('total');


        
        return view('Application.KioskParticipant.dashboard',[
        'application' => $application,
        'user' => $user,
        'totalUsers' => $totalUsers,
        'totalApp' => $totalApp,
        'totalKiosk' => $totalKiosk,
        'totalComplaint' => $totalComplaint,
        'userRoles' => $userRoles,
        'userCounts' => $userCounts,
        ]);
    }

    
    public function index(Request $request)
    {

        $user = Auth::user();
        $user = $request->user();
    
        $application = Application::where('userID', $user->userID)->get();
    
        return view('Application.KioskParticipant.form', [
            'application' => $application,
            'user' => $user,
        ]);
    }

    public function store(StoreApplicationRequest $request)
    {
        $application = New Application;

        $application->userID = auth()->user()->userID;


        $application->appName = $request->appName;
        $application->appPhoneNum = $request->appPhoneNum;
        $application->appBusinessType = $request->appBusinessType;
        $application->appKioskNum = $request->appKioskNum;
        $application->appBusinessPeriod = $request->appBusinessPeriod;
        $application->appStatus = 'In progress';


        $application->save();

        return redirect('/KP-appForm');

    }

    public function update(Request $request, $appID)
    {
    $application = Application::findOrFail($appID);

    $this->validate($request, [
    ]);

    $application->appName = $request->appName;
    $application->appPhoneNum = $request->appPhoneNum;
    $application->appBusinessType = $request->appBusinessType;
    $application->appKioskNum = $request->appKioskNum;
    $application->appBusinessPeriod = $request->appBusinessPeriod;

    $application->save();

    return redirect('/KP-appForm');
    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('Application.KioskParticipant.profile',[
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
            'userEmail' => 'required|email|max:255',
            'userAddress' => 'required|string|max:255',
            'userPhoneNum' => 'required|string|max:20',
            'userPassword' => 'nullable|string|min:6', // Add password validation if needed
            // Add more fields as needed
        ]);
    
        // Update user profile
        $userData = [
            'userName' => $request->input('userName'),
            'userIC' => $request->input('userIC'),
            'userEmail' => $request->input('userEmail'),
            'userAddress' => $request->input('userAddress'),
            'userPhoneNum' => $request->input('userPhoneNum'),
            // Update more fields as needed
        ];
    
        // Update password if provided
        if ($request->filled('userPassword')) {
            $userData['userPassword'] = bcrypt($request->input('userPassword'));
        }
    
        $user->update($userData);
    
        return redirect()->route('kp-profile');
    }
    
    
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect('/KP-appForm');

    }

    
}
