<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeoLocationController;
use App\Http\Controllers\IDsController;
use App\Http\Controllers\LoanDetailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\UserEntryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::get('/loan-details', [LoanDetailsController::class, 'index'])->name('loan_details.index');
    // Route::get('/emi-details', [LoanDetailsController::class, 'emiDetails'])->name('emi.details');
    Route::get('/process-data', [LoanDetailsController::class, 'processData'])->name('loan_details.process');
    Route::get('/user_entry/list', [UserEntryController::class, 'index'])->name('user_entry.list');
    Route::get('/user_entry/create', [UserEntryController::class, 'create'])->name('user_entry.create');
    Route::post('/user_entry/store', [UserEntryController::class, 'store'])->name('user_entry.store');
    Route::get('/public-ip-address', [GeoLocationController::class, 'index'])->name('ip.address');
    Route::get('/export-ids', [IDsController::class, 'exportIds'])->name('export.ids');
    Route::get('send-mail', [SendMailController::class, 'index'])->name('mail.from');
    Route::post('send-mail', [SendMailController::class, 'sendMail'])->name('email.send');

});

require __DIR__.'/auth.php';
