<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kpPayment', [App\Http\Controllers\Payment\kpPaymentController::class, 'index'])->name('kpPayment');
Route::post('/addPayment', [App\Http\Controllers\Payment\kpPaymentController::class, 'savePayment'])->name('addPayment');
Route::get('/kpInvoice', [App\Http\Controllers\Payment\kpPaymentController::class, 'indexInvoice'])->name('kpInvoice');
Route::get('/FKBursaryPayment', [App\Http\Controllers\Payment\FKBursaryPaymentController::class, 'index'])->name('FKBursaryPayment');
Route::post('/addFKBursaryPayment', [App\Http\Controllers\Payment\FKBursaryPaymentController::class, 'savePayment'])->name('addFKBursaryPayment');
Route::post('/updatePayment/{payID}', [App\Http\Controllers\Payment\FKBursaryPaymentController::class, 'viewPayment'])->name('updatePayment');
Route::get('/printFKBursaryPayment/{payID}', [App\Http\Controllers\Payment\FKBursaryPaymentController::class, 'createReceipt'])->name('printFKBursaryPayment');
Route::post('/generateReceipt/{payID}', [App\Http\Controllers\Payment\FKBursaryPaymentController::class, 'generateReceipt'])->name('generateReceipt');
