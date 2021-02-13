<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\Task\TaskController;
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
    
    
    Route::group(['middleware' => 'auth:sanctum'], function () {
        
        Route::get('/user', function(Request $request){
            return $request->user();
        });
        
        /**Task Route */
        Route::apiResource('task', TaskController::class);

        /** Logout Route **/
        Route::get('logout', [LoginController::class, 'logout']);
    });
});


