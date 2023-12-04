<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = Application::all();
        $user = User::find(1);
       return view('Application.Admin.dashboard',[
           'application' => $application,
           'user' => $user,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        $application->delete();

        return redirect('/dashboard-admin');

    }
}
