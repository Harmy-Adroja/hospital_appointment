<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CustomRegisterController;

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});

Route::get('/',                         [HomeController::class,'index']);
Route::get('/home',                     [HomeController::class,'show'])              ->name('home')->middleware('auth','verified','mainauth');
Route::post('/store-appointment',       [HomeController::class,'store'])             ->name('appointment.store');
Route::get('/show-Myappointment',       [HomeController::class,'showMyAppointments'])->name('Myappointment.show');
Route::get('/delete-appointment/{id}',  [HomeController::class,'destroy'])           ->name('appointment.delete');
Route::get('/download/{file}',          [HomeController::class,'download'])          ->name('attachment.download');


Route::middleware(['authadmin'])->group(function () {
    
    Route::get('/create-doctor',            [AdminController::class, 'create'])          ->name('doctor.create')->middleware('role:Super Admin');
    Route::post('/store-doctor',            [AdminController::class, 'store'])           ->name('doctor.store')->middleware('role:Super Admin');
    Route::get('/show-doctors',             [AdminController::class, 'show'])            ->name('doctor.show')->middleware('role:Super Admin');
    Route::get('/edit-doctor/{id}',         [AdminController::class, 'edit'])            ->name('doctor.edit')->middleware('role:Super Admin');
    Route::post('/update-doctor/{id}',      [AdminController::class, 'update'])          ->name('doctor.update')->middleware('role:Super Admin');
    Route::get('/delete-doctor/{id}',       [AdminController::class, 'destroy'])         ->name('doctor.delete')->middleware('role:Super Admin');
    Route::get('/approve-appointment/{id}', [AdminController::class, 'approve'])         ->name('appointment.approve');
    Route::get('/cancel-appointment/{id}',  [AdminController::class, 'cancel'])          ->name('appointment.cancel');
    Route::get('/show-emailview/{id}',      [AdminController::class, 'showEmailView'])   ->name('email.show');
    Route::post('/send-email/{id}',         [AdminController::class, 'sendEmail'])       ->name('sendemail');
    Route::get('/show-appointments',        [AdminController::class, 'showAppointments'])->name('appointment.show');
    //Route::get('/show-userifo',        [AdminController::class, 'showUserInfo'])->name('userinfo.show')->middleware('role:doctor');
    Route::get('/update-user/{id}',            [AdminController::class, 'updateUser'])         ->name('update.user');
});

Route::resource('roles', RoleController::class)->middleware('role:Super Admin');

Route::get('/newregister', [CustomRegisterController::class, 'register'])->name('newregister')->middleware('role:Super Admin');
