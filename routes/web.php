<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SaleController\kpSaleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
//KIOSK PARTICIPANT SALE
Route::get('kpsale', function () {
    return view('Sale.kpSale');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Define routes for Kiosk Participant Sale
Route::get('kpsale', [kpSaleController::class, 'index'])->name('kpsale.index');
Route::post('kpsale/store', [kpSaleController::class, 'store'])->name('kpsale.store');
Route::put('kpsale/{sale}', [kpSaleController::class, 'update'])->name('kpsale.update');
Route::get('/kpsale/{sale}/delete', [kpSaleController::class, 'destroy']);

