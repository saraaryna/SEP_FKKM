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
    Route::get('/kpComplaint', [App\Http\Controllers\Complaint\kpComplaintController::class, 'index'])->name('kpComplaint');
    Route::post('/kpComplaint', [App\Http\Controllers\Complaint\kpComplaintController::class, 'store'])->name('kpComplaint');
    Route::get('/fktComplaint', [App\Http\Controllers\Complaint\fktComplaintController::class, 'index'])->name('fktComplaint');
    Route::resource('/sale', SaleController::class);



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
    


