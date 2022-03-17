<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\App\Http\Controllers\LoginController;
use Illuminate\App\Http\Controllers\RegisterController;
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
/*
Route::get('/', function () {
    //return view('welcome');

    if(Auth::check()) 
    {
        return redirect('/app');
    }
    return redirect('/login');
});

Route::get('/',function()
{
    return view('welcome');
});

Route::group(['middleware'=>['guest']],function()
{
Route::get('/login','App\Http\Controllers\LoginController@index')->name('login.index');
Route::post('/login.authenticate','App\Http\Controllers\LoginController@authenticate')->name('login.authenticate');// /login
//Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('login.logout');
Route::get('/signup','App\Http\Controllers\RegisterController@index')->name('register.index');
Route::post('/signup.create','App\Http\Controllers\RegisterController@create')->name('register.create');
});


*/

