<?php
//ERNIE MASTURA BINTI BAKRI (CB21161)

namespace  App\Http\Controllers\SaleController;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Http\Controllers\Controller;

class padminSaleController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve the sales data from the database
        $sales = Sale::all();

        // Prepare data for chart
        $chartData = $this->prepareChartData($sales);

        // Pass the sales and chart data to the view
        return view('Sale.padminSale', ['sales' => $sales, 'chartData' => $chartData]);
    }

    private function prepareChartData($sales)
    {
        $chartData = [];

        foreach ($sales as $sale) {
            $month = date('F', strtotime($sale->salesDate));
            $chartData[$month] = isset($chartData[$month]) ? $chartData[$month] + $sale->salesTotal : $sale->salesTotal;
        }

        return $chartData;
    }
}
