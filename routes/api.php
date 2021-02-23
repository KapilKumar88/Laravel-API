<?php

use App\Http\Controllers\Api\V1\Auth\ForgotPasswordController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Task\TaskController;
use App\Http\Controllers\Api\V1\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function(){
    /** Register Route **/
    Route::post('register', RegisterController::class);
    /** Login Route **/
    Route::post('login', [LoginController::class, 'login']);
    /**Password reset route */
    Route::get('forgot-password', ForgotPasswordController::class);
    
    Route::group(['middleware' => 'auth:sanctum'], function () {
        
        /** User Profile Route */
        Route::get('/user', ProfileController::class);
        
        /**Task Route */
        Route::apiResource('task', TaskController::class);

        /** Logout Route **/
        Route::get('logout', [LoginController::class, 'logout']);
    });
});


