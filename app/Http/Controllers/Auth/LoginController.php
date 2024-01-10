<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // ...

    /**
     * Where to redirect users after login.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $user
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->userRole === 'Kiosk Participant') {
            return redirect('/kpsale');
        }

        // Add other role checks if needed
        // ...

        // Default redirect if no specific role is matched
        return redirect('/home');
    }

    // ...
}
