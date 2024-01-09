<?php

use App\Http\Controllers\ApplicationController\adminApplicationController;
use App\Http\Controllers\KioskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController\kpComplaintController;
use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Route::get('/dashboard-admin', function () {
//     return view('Application/Admin/dashboard');
// });

// require __DIR__.'/auth.php';
/*Route::get('/sale', function () {
    return view('Sale/sale');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/dashboard-admin', adminApplicationController::class);
Route::resource('/kiosk-admin', KioskController::class);
Route::resource('complaint', kpComplaintController::class);
Route::resource('sale', SaleController::class);
