<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('login',['uses'=>'TestController@index']);
Route::any('i_main',['uses'=>'TestController@i_main']);
Route::get('login_out',['uses'=>'TestController@login_out']);


Route::get('/', function () {
    return view('Test/index');
});
