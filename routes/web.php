<?php

use App\Http\Controllers\customer\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('customer.pages.index', ['pageTitle' => 'Home']);
})->name('customer');
Route::get('customer/signup', function () {
    return view('customer.pages.auth.signup', ['pageTitle' => 'Signup']);
})->name('customer.signup');
Route::get('customer/login', function () {
    return view('customer.pages.auth.login', ['pageTitle' => 'Login']);
})->name('customer.login');
Route::post('customer/signup-manager', [AuthController::class, 'signupManager'])->name('customer.signup-manager');
Route::post('customer/signup-customer', [AuthController::class, 'signupCustomer'])->name('customer.signup-customer');
Route::post('customer/login-user', [AuthController::class, 'loginUser'])->name('customer.login-user');
Route::get('customer/customer-logout', [AuthController::class, 'customerLogout'])->name('customer.customer-logout');
Route::get('customer/manager-logout', [AuthController::class, 'managerLogout'])->name('customer.manager-logout');
Route::get('/manager', function () {
    return view('manager.pages.index', ['pageTitle' => 'Home Page']);
})->name('manager');

Route::get('customer/show-link-request-form', [AuthController::class, 'showLinkRequestForm'])->name('customer.show-link-request-form');
Route::post('customer/send-reset-link-email', [AuthController::class, 'sendResetLinkEmail'])->name('customer.send-reset-link-email');

Route::get('customer/show-update-password-form/{token}', [AuthController::class, 'showUpdatePasswordForm'])->name('password.reset');
Route::post('customer/update-password', [AuthController::class, 'updatePassword'])->name('customer.update-password');

Route::get('customer/banquets', function () {
    return view('customer.pages.banquet', ['pageTitle' => 'Banquets']);
});
Route::get('customer/banquets-details', function () {
    return view('customer.pages.banquet-details', ['pageTitle' => 'Banquets Details']);
});
Route::get('customer/banquets-booking', function () {
    return view('customer.pages.banquet-booking', ['pageTitle' => 'Banquets Booking']);
});