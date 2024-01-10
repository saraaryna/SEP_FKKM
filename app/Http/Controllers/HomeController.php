<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userRole = Auth::user()->userRole; // Use the correct field name
        
    
        if ($userRole == 'Admin') {
            return view('Application.Admin.dashboard');
        } elseif ($userRole == 'Kiosk Participant') {
            return view('Sale.kpSale');
        } else {
            return view('home');
        }
    }
}
