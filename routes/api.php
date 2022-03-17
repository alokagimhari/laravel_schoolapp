<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewPasswordController;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) { //change from  ('auth:sanctum') to ('auth:api') 
    return $request->user();
});*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::post('register',[App\Http\Controllers\AuthController::class,'register']);
Route::post("/login",[App\Http\Controllers\AuthController::class,'login']);
Route::post('/forgot-Password',[App\Http\Controllers\NewPasswordController::class,'forgotPassword']);
Route::post('/verify/token',[App\Http\Controllers\NewPasswordController::class,'verifytoken']);
Route::post('/reset-Password',[App\Http\Controllers\NewPasswordController::class,'resetPassword']);
//make by me
/*Route::post('/user','RegisterController@create');
Route::group(['middleware'=>['guest']],function()
{
Route::get('/login','App\Http\Controllers\LoginController@index')->name('login.index');
Route::post('/login.authenticate','App\Http\Controllers\LoginController@authenticate')->name('login.authenticate');// /login
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('login.logout');
Route::get('/signup','App\Http\Controllers\RegisterController@index')->name('register.index');
Route::post('/signup.create','App\Http\Controllers\RegisterController@create')->name('register.create');
});
*/
