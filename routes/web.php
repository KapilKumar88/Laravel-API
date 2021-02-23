<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showForm'])->middleware('guest')->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class,'formSubmission'])->name('password.request');
Route::get('success', [ForgotPasswordController::class,'success'])->name('success');