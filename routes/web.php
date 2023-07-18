<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\tokerVerificationMiddleware;
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
// Page Routes
Route::get('/userLogin',[userController::class,'LoginPage']);
Route::get('/userRegistration',[userController::class,'RegistrationPage']);
Route::get('/sendOtp',[userController::class,'SendOtpPage']);
Route::get('/verifyOtp',[userController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[userController::class,'ResetPasswordPage']);



// API Routes
Route::post('/user_registration',[userController::class,'userRegistration']);
Route::post('/user_login',[userController::class,'userLogin']);
Route::post('/send_otp',[userController::class,'sendOTP']);
Route::post('/verify_otp',[userController::class,'verifyOTP']);

Route::post('/reset_password',[userController::class,'resetPass'])->middleware([tokerVerificationMiddleware::class]);



Route::get('/dashboard',[DashboardController::class,'DashboardPage']);
