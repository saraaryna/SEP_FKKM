<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SaleController;
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

Route::get('/sale', function () {
    return view('Sale.sale');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('complaint', ComplaintController::class);
Route::resource('sale', SaleController::class);