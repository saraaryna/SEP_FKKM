<?php

namespace App\Http\Controllers\ApplicationController;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Complaint;
use App\Models\Kiosk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminApplicationController extends Controller
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


        
        return view('Application.Admin.dashboard',[
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
        $user = $request->user();
        $userRole = $user->userRole;

      if($userRole == 'Admin')
     {
        $application = Application::all();
        return view('Application.Admin.form',[
            'application' => $application,
            'user' => $user,
        ]);
     }
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

        return redirect('/Admin-appForm');

    }


    public function update(UpdateApplicationRequest $request, Application $application)
    {
            

        $application = Application::find($application->appID);
        $application->appStatus = $request->appStatus;
    
        $application->save();
    
        return redirect('/Admin-appForm');
    }
    

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect('/Admin-appForm');

    }

    public function profile(Request $request)
    {
        $user = $request->user();

        return view('Application.Admin.profile',[
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
        // Add more fields as needed
    ]);

    // Update user profile
    $user->update([
        'userName' => $request->input('userName'),
        'userIC' => $request->input('userIC'),
        'userEmail' => $request->input('userEmail'),
        'userAddress' => $request->input('userAddress'),
        'userPhoneNum' => $request->input('userPhoneNum'),
        // Update more fields as needed
    ]);

    return redirect()->route('admin-profile');
    }

public function user(Request $request)
{
    $user = $request->user();
    $user = User::all();

    return view('Application.Admin.user',[
        'user' => $user,
    ]);
}


public function addUser(Request $request)
{
    // Validate the form data (customize validation rules as needed)
    $validatedData = $request->validate([
        'userName' => 'required|string|max:255',
        'userIC' => 'required|string|max:20',
        'userEmail' => 'required|email|max:255',
        'userAddress' => 'required|string|max:255',
        'userPhoneNum' => 'required|string|max:20',
        'userRole' => 'required|string|in:Kiosk Participant,FK Technical Team,FK Bursary,PUPUK Admin', // Adjust roles as needed
        // Add more fields as needed
    ]);

    // Set userPassword to hashed userIC
    $validatedData['userPassword'] = Hash::make($validatedData['userIC']);

    // Create a new user
    User::create($validatedData);

    return redirect()->route('admin-manageUser');
}

public function deleteUser(User $user)
{
    $user->delete();

    return redirect()->route('admin-manageUser');
}



}
