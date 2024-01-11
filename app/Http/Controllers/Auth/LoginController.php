<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticate(Request $request )
    {
        $credentials = $request->only('email', 'password');
        $userRole = $request->input('userRole');

        if (Auth::attempt($credentials, $userRole)) {
            if($userRole === 'Admin'){
                return redirect()->route('admin.dashboard'); // Adjust the route name as needed
            } elseif ($userRole === 'Kiosk Participant') {
                return redirect()->route('kp.dashboard'); // Adjust the route name as needed
            } elseif ($userRole === 'PUPUK admin') {
                return redirect()->route('padmin.index'); // Adjust the route name as needed
            } else {
                // You can add more conditions or a default redirection here
                return redirect()->route('home'); // Adjust the route name as needed
            }
            
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
