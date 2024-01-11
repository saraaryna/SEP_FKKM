<?php

namespace App\Http\Controllers\KioskController;

use App\Models\Kiosk;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKioskRequest;
use App\Http\Requests\UpdateKioskRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class KioskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $kiosk = Kiosk::all();
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
        $kiosk = new Kiosk;
        $user = Auth::user();
        $kiosk->userID = $user->userID;;
        $kiosk->kioskNumber = $request->kioskNumber;
        $kiosk->kioskLocation = $request->kioskLocation;
        $kiosk->kioskStatus = $request->kioskStatus;
        $kiosk->save();

        return redirect('/adminKiosk');
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
        $kiosk->kioskID = $request->kioskID;
        $kiosk= Kiosk::find($kiosk->kioskID);
        $kiosk->kioskNumber= $request->kioskNumber;
        $kiosk->kioskLocation= $request->kioskLocation;
        $kiosk->kioskStatus = $request->kioskStatus;
        $kiosk->update();
        return redirect('/adminKiosk');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($kioskID)
{
    // Find the Kiosk record based on $kioskID
    $kiosk = Kiosk::find($kioskID);

    if (!$kiosk) {
        // Optionally, handle the case where the Kiosk record is not found
        return redirect()->back()->with('error', 'Kiosk not found');
    }

    // Delete the Kiosk record
    $kiosk->delete();

    // Optionally, redirect the user after the deletion
    return redirect()->route('/adminKiosk');
}
}
