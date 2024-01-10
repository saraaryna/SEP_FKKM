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

/*Route::get('/sale', function () {
    return view('Sale/sale');
});*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/* Kiosk */
Route::get('/adminKiosk', [App\Http\Controllers\KioskController\KioskController::class, 'index'])->name('adminKiosk');
Route::post('/adminKiosk', [App\Http\Controllers\KioskController\KioskController::class, 'store'])->name('adminKiosk');
Route::put('/kioskEdit', [App\Http\Controllers\KioskController\KioskController::class, 'update'])->name('adminKiosk');
Route::delete('/kioskDestroy/{kioskID}', [App\Http\Controllers\KioskController\KioskController::class, 'destroy'])->name('kioskDestroy');

/* Complaint */
Route::get('/kpComplaint', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'index'])->name('kpComplaint');
Route::post('/kpComplaint', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'store'])->name('kpComplaint');
Route::put('/kpComplaintEdit', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'update'])->name('kpComplaint');
Route::delete('/kpComplaintDestroy', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'destroy'])->name('kpComplaint');
Route::get('/fktComplaint', [App\Http\Controllers\ComplaintController\fktComplaintController::class, 'index'])->name('fktComplaint');
Route::put('/fktComplaintEdit', [App\Http\Controllers\ComplaintController\fktComplaintController::class, 'update'])->name('fktComplaint');

Route::resource('/sale', SaleController::class);

/* Payment */
Route::get('/kpPayment', [App\Http\Controllers\PaymentController\kpPaymentController::class, 'index'])->name('kpPayment');
Route::post('/addPayment', [App\Http\Controllers\PaymentController\kpPaymentController::class, 'savePayment'])->name('addPayment');
Route::get('/kpInvoice', [App\Http\Controllers\PaymentController\kpPaymentController::class, 'indexInvoice'])->name('kpInvoice');
Route::get('/FKBursaryPayment', [App\Http\Controllers\PaymentController\FKBursaryPaymentController::class, 'index'])->name('FKBursaryPayment');
Route::post('/addFKBursaryPayment', [App\Http\Controllers\PaymentController\FKBursaryPaymentController::class, 'savePayment'])->name('addFKBursaryPayment');
Route::post('/updatePayment/{payID}', [App\Http\Controllers\PaymentController\FKBursaryPaymentController::class, 'viewPayment'])->name('updatePayment');
Route::get('/printFKBursaryPayment/{payID}', [App\Http\Controllers\PaymentController\FKBursaryPaymentController::class, 'createReceipt'])->name('printFKBursaryPayment');
Route::post('/generateReceipt/{payID}', [App\Http\Controllers\PaymentController\FKBursaryPaymentController::class, 'generateReceipt'])->name('generateReceipt');
