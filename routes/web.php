<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrescriptionController;


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
    return view('/login');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('/login');
});

Route::view("/login",'login');
Route::view("/register",'register');

Route::view("/master",'master');
Route::view("/admin",'admin');
Route::view("/viewprescription",'viewprescription');


Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::post('/prescription',[PrescriptionController::class,'upload']);
Route::get('/prescriptionlist',[PrescriptionController::class,'show']);
Route::get('/prescriptionlistdelete/{id}',[PrescriptionController::class,'delete']);
Route::get('/allprescriptions',[PrescriptionController::class,'showall']);
Route::view("/upload",'upload');
Route::get('/qatationreject/{id}',[PrescriptionController::class,'reject']);
Route::get('/qatationaccept/{id}',[PrescriptionController::class,'accept']);
Route::get('/qatationview/{id}',[PrescriptionController::class,'view']);

Route::post('/addmedicine',[PrescriptionController::class,'addmedicine']);
Route::get('/medicines',[PrescriptionController::class,'showmedicines']);
Route::post('/addquatation',[PrescriptionController::class,'addquatation']);


Route::get('/sendquataion/{id}/{tot}',[PrescriptionController::class,'sendquataion']);
