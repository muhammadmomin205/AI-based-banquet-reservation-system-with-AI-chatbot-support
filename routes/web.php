<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customer\AuthController;
use App\Http\Controllers\customer\ReviewController;
use App\Http\Controllers\customer\BanquetController;
use App\Http\Controllers\customer\DocumentController;
use App\Http\Controllers\manager\BanquetImageController;
use App\Http\Controllers\customer\BanquetDetailController;
use App\Http\Controllers\customer\BanquetBookingController;
use App\Http\Controllers\manager\BanquetDetailController as ManagerBanquetDetailController;

Route::get('/customer/home', function () {
    return view('customer.pages.index', ['pageTitle' => 'Home']);
})->name('customer');

Route::get('customer/signup', [AuthController::class, 'signup'])->name('customer.signup');
Route::get('customer/login', [AuthController::class, 'login'])->name('customer.login');
Route::post('customer/signup-manager', [AuthController::class, 'signupManager'])->name('customer.signup-manager');
Route::post('customer/signup-customer', [AuthController::class, 'signupCustomer'])->name('customer.signup-customer');
Route::post('customer/login-user', [AuthController::class, 'loginUser'])->name('customer.login-user');
Route::post('customer/customer-logout', [AuthController::class, 'customerLogout'])->name('customer.customer-logout');
Route::post('customer/manager-logout', [AuthController::class, 'managerLogout'])->name('customer.manager-logout');

Route::get('/manager/home', function () {
    return view('manager.pages.index', ['pageTitle' => '
    Home']);
})->name('manager');

Route::get('customer/show-link-request-form', [AuthController::class, 'showLinkRequestForm'])->name('customer.show-link-request-form');
Route::post('customer/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('customer.send-reset-link-email');
Route::get('customer/show-update-password-form/{token}', [AuthController::class, 'showUpdatePasswordForm'])->name('password.reset');
Route::post('customer/update-password', [AuthController::class, 'updatePassword'])->name('customer.update-password');

Route::get('customer/upload-documents/{id}', [DocumentController::class, 'uploadDocuments'])->name('customer.upload-documents');
Route::post('customer/save-documents', [DocumentController::class, 'saveDocuments'])->name('customer.save-documents');

Route::get('manager/banquet-images', [BanquetImageController::class, 'banquetImages'])->name('manager.banquet-images');
Route::post('manager/upload-banquet-images', [BanquetImageController::class, 'uploadBanquetImages'])->name('manager.upload-banquet-images');

Route::get('manager/add-details', [ManagerBanquetDetailController::class, 'addDetails'])->name('manager.add-details');
Route::post('manager/save-details', [ManagerBanquetDetailController::class, 'saveDetails'])->name('manager.save-details');

Route::get('customer/banquets', [BanquetController::class, 'banquets']);
Route::get('customer/banquets-details/{id}', [BanquetDetailController::class, 'banquetsDetails'])->name('customer.banquets-details');
Route::get('customer/banquets-booking/{id}',  [BanquetBookingController::class, 'banquetsBooking'])->name('customer.banquets-booking');
Route::post('customer/book-banquet', [BanquetBookingController::class, 'bookBanquet'])->name('customer.book-banquet');

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::post('customer/review/vote', [ReviewController::class, 'vote'])->name('customer.review.vote');
