<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $userRole = Auth::user()->userRole; // Use the correct field name
        $application = Application::all();
        $user = $request->user();

        $application = Application::all();
        $totalUsers = User::count();
        $totalApp = Application::count();
        // $totalKiosk = Kiosk::count();
        // $totalComplaint = Complaint::count();

        $userRoles = User::groupBy('userRole')->pluck('userRole');
        $userCounts = User::groupBy('userRole')->selectRaw('count(*) as total')->pluck('total');



        if ($userRole == 'Admin') {
            return view('Application.Admin.dashboard',[
                'application' => $application,
                'user' => $user,
                'totalUsers' => $totalUsers,
                'totalApp' => $totalApp,
                // 'totalKiosk' => $totalKiosk,
                // 'totalComplaint' => $totalComplaint,
                'userRoles' => $userRoles,
                'userCounts' => $userCounts,
        
            ]);
        } elseif ($userRole == 'Kiosk Participant') {
            return view('Application.KioskParticipant.dashboard',[
            'application' => $application,
            'user' => $user,
            'totalUsers' => $totalUsers,
            'totalApp' => $totalApp,
            // 'totalKiosk' => $totalKiosk,
            // 'totalComplaint' => $totalComplaint,
            'userRoles' => $userRoles,
            'userCounts' => $userCounts,
            ]);

        } else {
            return view('home');
        }
    }
}
