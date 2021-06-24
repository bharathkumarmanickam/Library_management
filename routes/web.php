<?php

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
    return view('login');
});

Route::get('/login',function(){
    return view("login");
});

Route::post('/checklogin','App\Http\Controllers\logincontroller@check');

Route::get('/createaccount',function(){
    return view('CreateAccount');
});

Route::post('/createuser','App\Http\Controllers\createcontroller@create');

Route::get('/dashboard',function(){
    return view('dashboard');
});

Route::get('/wronguser','App\Http\Controllers\logincontroller@wronguser');

Route::get('/checkbooks','App\Http\Controllers\librarymanage@checkbooks');

Route::get('/createbook','App\Http\Controllers\librarymanage@createbook');

Route::post('/insertbook','App\Http\Controllers\librarymanage@insertbook');

Route::get('/searchbook','App\Http\Controllers\librarymanage@searchbook');

Route::post('/search','App\Http\Controllers\librarymanage@searchb');

Route::get('/aoe','App\Http\Controllers\librarymanage@aoe');

Route::post('/editb','App\Http\Controllers\librarymanage@editb');

Route::post('/updatebook','App\Http\Controllers\librarymanage@editsearch');

Route::post('/updatebk','App\Http\Controllers\librarymanage@updatebook');

Route::get('/bookout','App\Http\Controllers\librarymanage@bookout');

Route::post('/lend','App\Http\Controllers\librarymanage@lend');

Route::get('/outstanding','App\Http\Controllers\librarymanage@outstand');

Route::get('/requestclose','App\Http\Controllers\librarymanage@requestclose');

Route::post('/close','App\Http\Controllers\librarymanage@closesearch');

Route::post('/closereq','App\Http\Controllers\librarymanage@closereq');

Route::get('/log','App\Http\Controllers\librarymanage@lenderlog');

Route::get('/logout','App\Http\Controllers\logincontroller@logout');

