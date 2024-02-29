<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect'])->middleware('auth','verified','mainauth');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');});


Route::get('/add_doctor_view',[AdminController::class,'addview'])->middleware('authadmin');
Route::post('/upload_doctor',[AdminController::class,'upload'])->name('upload_doctor')->middleware('authadmin');
Route::post('/appointment',[HomeController::class,'appointment'])->name('appointment');

Route::get('/myappointment',[HomeController::class,'myappointment'])->name('myappointment');
Route::get('/cancel_appoint/{id}',[HomeController::class,'cancel_appoint']);
Route::get('/showappointments',[AdminController::class,'showappointments'])->middleware('authadmin');
Route::get('/approved/{id}',[AdminController::class,'approved'])->middleware('authadmin');
Route::get('/canceled/{id}',[AdminController::class,'canceled'])->middleware('authadmin');
Route::get('/showdoctors',[AdminController::class,'showdoctors'])->middleware('authadmin');
Route::get('/deletedoctor/{id}',[AdminController::class,'deletedoctor'])->middleware('authadmin');
Route::get('/updatedoctor/{id}',[AdminController::class,'updatedoctor'])->middleware('authadmin');
Route::post('/editdoctor/{id}',[AdminController::class,'editdoctor'])->name('editdoctor')->middleware('authadmin');
Route::get('/emailview/{id}',[AdminController::class,'emailview'])->middleware('authadmin');
Route::post('/sendemail/{id}',[AdminController::class,'sendemail'])->name('sendemail')->middleware('authadmin');
Route::get('/download/{file}',[HomeController::class,'download']);