<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeController;
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
// Public Route
Route::middleware('guest')->group(function(){
    Route::match(['get'], '/{uri?}',[AuthController::class, 'loginPage'])->name('loginPage')
    ->where('uri', '(|login)')
    ->name('loginPage');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerPage']);
    Route::post('register', [AuthController::class, 'register'])->name('register');

});

Route::get('checkAuth', function(){
    return Auth::check() ? "User ". Auth::user()->name : "User is not authenticated";
});

// Private Route
Route::middleware(['auth'])->group(function(){
    Route::get('dashboard', [HomeController::class, 'dashboard'])->name("dashboard");
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});