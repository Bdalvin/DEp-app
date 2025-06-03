<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/home',[homecontroller::class,'redirect']);
Route::get('/user/home', [homecontroller::class, 'userHome'])->name('user.home')->middleware('auth');
//Route::get('/home', [UserHomeController::class, 'index'])->middleware('auth');//

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('appointments', AppointmentController::class)->middleware('auth');
Route::put('/user/update-emergency-contact', [homecontroller::class, 'updateEmergencyContact'])->name('user.updateEmergencyContact')->middleware('auth');
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
