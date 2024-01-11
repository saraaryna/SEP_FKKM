<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        if ($user->userRole === 'Kiosk Participant') {
            return redirect('/kpsale');
        }

        // Add other role checks if needed
        // ...

        // Default redirect if no specific role is matched
        return redirect('/home');
    }

    protected function authenticated(Request $request, $user)
    {
        dd($user->userRole);
        // Redirect based on userRole
        if ($user->userRole === 'Admin') {
            return redirect()->route('Application.Admin.dashboard'); // Adjust the route name as needed
        } elseif ($user->userRole === 'Kiosk Participant') {
            return redirect()->route('kiosk.dashboard'); // Adjust the route name as needed
        } else {
            // You can add more conditions or a default redirection here
            return redirect()->route('home'); // Adjust the route name as needed
        }
    }
}
