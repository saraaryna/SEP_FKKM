<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = RouteServiceProvider::HOME;


    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userName' => ['required', 'string', 'max:255'],
            'userEmail' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'userPassword' => ['required', 'string', 'min:8'],
        ]);
    }
    

        protected function create(array $data)
        {
            return User::create([
                'userName' => $data['userName'],
                'userIC' => $data['userIC'],
                'userAddress' => $data['userAddress'],
                'userPhoneNum' => $data['userPhoneNum'],
                'userEmail' => $data['userEmail'],
                'userPassword' => Hash::make($data['userPassword']),

            ]);

            
        }
    }