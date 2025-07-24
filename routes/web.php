<?php

use App\Http\Controllers\customer\AuthController;
use App\Http\Controllers\customer\BanquetController;
use App\Http\Controllers\customer\UploadDocumentsController;
use App\Http\Controllers\manager\BanquetImagesController;
use Illuminate\Support\Facades\Route;

Route::get('/customer/home', function () {
    return view('customer.pages.index', ['pageTitle' => 'Home']);
})->name('customer');

Route::get('customer/signup', [AuthController::class, 'signup'])->name('customer.signup');
Route::get('customer/login', [AuthController::class, 'login'])->name('customer.login');
Route::post('customer/signup-manager', [AuthController::class, 'signupManager'])->name('customer.signup-manager');
Route::post('customer/signup-customer', [AuthController::class, 'signupCustomer'])->name('customer.signup-customer');
Route::post('customer/login-user', [AuthController::class, 'loginUser'])->name('customer.login-user');
Route::get('customer/customer-logout', [AuthController::class, 'customerLogout'])->name('customer.customer-logout');
Route::get('customer/manager-logout', [AuthController::class, 'managerLogout'])->name('customer.manager-logout');

Route::get('/manager/home', function () {
    return view('manager.pages.index', ['pageTitle' => 'Home']);
})->name('manager');

Route::get('customer/show-link-request-form', [AuthController::class, 'showLinkRequestForm'])->name('customer.show-link-request-form');
Route::post('customer/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('customer.send-reset-link-email');
Route::get('customer/show-update-password-form/{token}', [AuthController::class, 'showUpdatePasswordForm'])->name('password.reset');
Route::post('customer/update-password', [AuthController::class, 'updatePassword'])->name('customer.update-password');

Route::get('customer/banquets', [BanquetController::class, 'banquets']);
Route::get('customer/banquets-details', [BanquetController::class, 'banquetsDetails']);
Route::get('customer/banquets-booking',  [BanquetController::class, 'banquetsBooking']);
Route::get('customer/upload-documents/{id}', [UploadDocumentsController::class, 'uploadDocuments'])->name('customer.upload-documents');
Route::post('customer/save-documents', [UploadDocumentsController::class, 'saveDocuments'])->name('customer.save-documents');

Route::get('manager/banquet-images', [BanquetImagesController::class, 'index'])->name('manager.banquet-images');
Route::post('manager/upload-banquet-images', [BanquetImagesController::class, 'uploadBanquetImages'])->name('manager.upload-banquet-images');
