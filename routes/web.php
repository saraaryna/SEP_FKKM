<?php

use App\Http\Controllers\ApplicationController\AdminApplicationController;
use App\Http\Controllers\ApplicationController\kpApplicationController;
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
    return view('auth.login');
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


/* Kiosk */
Route::get('/adminKiosk', [App\Http\Controllers\KioskController\KioskController::class, 'index'])->name('adminKiosk');
Route::post('/adminKiosk', [App\Http\Controllers\KioskController\KioskController::class, 'store'])->name('adminKiosk');
Route::put('/kioskEdit', [App\Http\Controllers\KioskController\KioskController::class, 'update'])->name('adminKiosk');
Route::delete('/kioskDestroy/{kioskID}', [App\Http\Controllers\KioskController\KioskController::class, 'destroy'])->name('kioskDestroy');

/* Complaint */
Route::get('/kpComplaint', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'index'])->name('kpComplaint');
Route::post('/kpComplaint', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'store'])->name('kpComplaint');
Route::put('/kpComplaintEdit', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'update'])->name('kpComplaint');
Route::delete('/kpComplaintDestroy/{complaintID}', [App\Http\Controllers\ComplaintController\kpComplaintController::class, 'destroy'])->name('kpComplaintDestroy');
Route::get('/fktComplaint', [App\Http\Controllers\ComplaintController\fktComplaintController::class, 'index'])->name('fktComplaint');
Route::put('/fktComplaintEdit', [App\Http\Controllers\ComplaintController\fktComplaintController::class, 'update'])->name('fktComplaint');
Route::put('/fktComplaintEditStatus', [App\Http\Controllers\ComplaintController\fktComplaintController::class, 'update'])->name('fktComplaint');

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

// APPLICATION 
// Admin
Route::get('/Admin', [AdminApplicationController::class, 'showDashboard'])->name('admin.dashboard');
Route::resource('Admin-appForm', AdminApplicationController::class);
Route::get('/Admin-appForm/{application}/delete', [AdminApplicationController::class, 'destroy']);
Route::put('/appEdit/{application}', [App\Http\Controllers\ApplicationController\AdminApplicationController::class, 'update'])->name('Admin.update');
// KP
Route::get('/KioskParticipant', [kpApplicationController::class, 'showDashboard'])->name('kp.dashboard');
Route::get('/KP-appForm', [kpApplicationController::class, 'index'])->name('kp.form');
Route::post('/KP-appForm', [kpApplicationController::class, 'store'])->name('kp.form');
Route::put('/appEditKP/{application}', [kpApplicationController::class, 'update'])->name('kp.update');
Route::get('/KP-appForm/{application}/delete', [kpApplicationController::class, 'destroy']);

// Account
// ADMIN
Route::get('/admin-profile', [AdminApplicationController::class, 'profile'])->name('admin-profile');
Route::get('/admin-manageUser', [AdminApplicationController::class, 'user'])->name('admin-manageUser');
Route::put('/admin-profile/update', [AdminApplicationController::class, 'updateProfile'])->name('admin.profile.update');
Route::post('/admin/add-user', [AdminApplicationController::class, 'addUser'])->name('admin.addUser');
Route::get('/admin/user/{user}', [AdminApplicationController::class, 'deleteUser'])->name('admin.deleteUser');

// KP
Route::get('/KP-profile', [kpApplicationController::class, 'profile'])->name('kp-profile');
Route::put('/KP-profile/update', [kpApplicationController::class, 'updateProfile'])->name('kp.profile.update');



