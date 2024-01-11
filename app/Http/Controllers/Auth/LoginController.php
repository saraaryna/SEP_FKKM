<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();
    
        if ($user && Hash::check($credentials['password'], $user->password)) {
            // Check the user's role
            $userRole = $request->input('userRole');
    
            if ($user->role === $userRole) {
                if ($userRole === 'Admin') {
                    return redirect()->route('admin.dashboard');
                } elseif ($userRole === 'Kiosk Participant') {
                    return redirect()->route('kp.dashboard');
                } elseif ($userRole === 'PUPUK Admin') {
                    return redirect()->route('padmin.index');
                } elseif ($userRole === 'Fk Bursary') {
                    return redirect()->route('FKBursaryPayment');
                } else {
                    return redirect()->route('home');
                }
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
