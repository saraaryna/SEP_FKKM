<?php

namespace App\Http\Controllers\KioskController;

use App\Models\Kiosk;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKioskRequest;
use App\Http\Requests\UpdateKioskRequest;

class KioskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kiosk = Kiosk::all();
        $user = User::find(1);
        return view('Kiosk.adminKiosk', [
            'kiosk' => $kiosk,
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
    public function store(StoreKioskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kiosk $kiosk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kiosk $kiosk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKioskRequest $request, Kiosk $kiosk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kiosk $kiosk)
    {
        //
    }
}
