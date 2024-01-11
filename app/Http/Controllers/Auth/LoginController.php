<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        // Redirect based on userRole
        if ($user->userRole === 'Admin') {
            return redirect()->route('Application.Admin.dashboard'); // Adjust the route name as needed
        } elseif ($user->userRole === 'Kiosk Participant') {
            return redirect()->route('kiosk.dashboard'); // Adjust the route name as needed
        } else {
            // You can add more conditions or a default redirection here
            return redirect()->route('default.dashboard'); // Adjust the route name as needed
        }
    }
}
