<?php

namespace App\Http\Controllers\ApplicationController;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\User;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class adminApplicationController extends Controller
{

    public function index()
    {
        $application = Application::all();
        $user = User::find(1);
       return view('Application.Admin.dashboard',[
           'application' => $application,
           'user' => $user,
       ]);

    }


    public function store(StoreApplicationRequest $request)
    {
        $application = New Application;

        $application->appName = $request->appName;
        $application->appPhoneNum = $request->appPhoneNum;
        $application->appBusinessType = $request->appBusinessType;
        $application->appKioskNum = $request->appKioskNum;
        $application->appBusinessPeriod = $request->appBusinessPeriod;
        $application->appStatus = 'In progress';


        $application->save();

        return redirect('/dashboard-admin');

    }

    public function show(Application $application)
    {
        //
    }


    public function update(UpdateApplicationRequest $request, Application $application)
    {
        $application = Application ::where('id', $request->id)->where('appStatus','In progress')->get()->first();

        $application->appName = $request->appName;
        $application->appPhoneNum = $request->appPhoneNum;
        $application->appBusinessType = $request->appBusinessType;
        $application->appKioskNum = $request->appKioskNum;
        $application->appBusinessPeriod = $request->appBusinessPeriod;


        $application->save();

        return redirect('/dashboard-admin');

    }


    public function destroy(Application $application)
    {
        $application->delete();

        return redirect('/dashboard-admin');

    }
}
