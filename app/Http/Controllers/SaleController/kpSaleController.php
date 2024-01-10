<?php

//ERNIE MASTURA BINTI BAKRI (CB21161)

namespace App\Http\Controllers\SaleController;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 


class kpSaleController extends Controller
{

    public function index(Request $request)
    {
        $user = $request->user();
    
        $sales = Sale::all(); // Use the Sale model to retrieve all sales data
        return view('Sale.kpSale', ['sales' => $sales]);
    }

    

    public function store(Request $request)
    {
        // $user = Auth::user(); // Retrieve authenticated user
        // $sale->userID = $user->userID;
        $sale = Sale::create([
            'salesDate' => $request->salesDate,
            'salesTotal' => $request->totalSales,
            // 'userID' => $userID,
        ]);

        // Fetch all sales after adding the new sale
        $sales = Sale::all();

        // Pass the sales data to the view and show a success message
        return view('Sale.kpSale', compact('sales'))->with('success', 'New sale added successfully');
    }

    public function update(Request $request, $id) {
        $sale = Sale::find($id);
        $sale->update($request->all());
        return redirect('/kpsale')->with('success', 'Record updated successfully');
    }

    

    public function edit(Sale $sale)
    {
        //
    }


    public function destroy(Sale $sale)
    {
        //
        $sale->delete();

        return redirect('/dashboard-admin');

    }
}
