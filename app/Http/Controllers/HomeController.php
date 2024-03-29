<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Complaint;
use App\Models\Kiosk;
use App\Models\User;
use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function prepareChartData($sales)
    {
        $chartData = [];

        foreach ($sales as $sale) {
            $month = date('F', strtotime($sale->salesDate));

            $chartData[$month] = isset($chartData[$month]) ? $chartData[$month] + $sale->salesTotal : $sale->salesTotal;

        }

        return $chartData;
    }
    public function index(Request $request)
    {
        $userRole = Auth::user()->userRole; // Use the correct field name
        $application = Application::all();
        $user = $request->user();

        $application = Application::all();
        $totalUsers = User::count();
        $totalApp = Application::count();
        $totalKiosk = Kiosk::count();
        $totalComplaint = Complaint::count();
        $totalKiosk = Kiosk::count();
        $totalComplaint = Complaint::count();
        $users = User::all();
        $sales = Sale::all();
        $kiosk = Kiosk::all(); 
        $complaint = Complaint::all();
        $payment = Payment::all();

        $userRoles = User::groupBy('userRole')->pluck('userRole');
        $userCounts = User::groupBy('userRole')->selectRaw('count(*) as total')->pluck('total');
        $chartData = $this->prepareChartData($sales);


        if ($userRole == 'Admin') {
            return view('Application.Admin.dashboard',[
                'application' => $application,
                'user' => $user,
                'users' => $users,
                'totalUsers' => $totalUsers,
                'totalApp' => $totalApp,
                'totalKiosk' => $totalKiosk,
                'totalComplaint' => $totalComplaint,
                'userRoles' => $userRoles,
                'userCounts' => $userCounts,
        
            ]);
        } elseif ($userRole == 'Kiosk Participant') {
            return view('Application.KioskParticipant.dashboard',[
            'application' => $application,
            'user' => $user,
            'users' => $users,
            'totalUsers' => $totalUsers,
            'totalApp' => $totalApp,
            'totalKiosk' => $totalKiosk,
            'totalComplaint' => $totalComplaint,
            'userRoles' => $userRoles,
            'userCounts' => $userCounts,
            ]);

        } 
        elseif ($userRole == 'PUPUK Admin')
        {
            return view('Sale.padminSale',[
                'user' => $user,
                'users' => $users,
                'sales' => $sales,
                'kiosk' => $kiosk,
                'chartData' => $chartData,
            ]);
        }elseif ($userRole == 'FK Technical Team')
        {
            return view('Complaint.fktComplaint',[
                'user' => $user,
                'complaint' => $complaint,
            ]);
        }
        elseif ($userRole == 'Fk Bursary')
        {
            return view('Payment.FKBursaryPayment',[
                'user' => $user,
                'payment' => $payment,
                'application' => $application,
            ]);
        }
        else {
            return view('home');
        }
    }
}
