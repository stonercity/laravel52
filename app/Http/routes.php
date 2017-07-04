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
//用户
Route::any('login',['uses'=>'TestController@index']);
Route::any('i_main',['uses'=>'TestController@i_main']);
Route::get('login_out',['uses'=>'TestController@login_out']);
Route::get('content/{id?}',['uses'=>'TestController@content']);
Route::get('detial/{id?}',['uses'=>'TestController@detial']);
Route::any('upload',['uses'=>'TestController@upload']);
Route::any('check',['uses'=>'TestController@check']);
Route::get('update/{id?}',['uses'=>'TestController@update']);
Route::get('delete/{id?}',['uses'=>'TestController@delete']);


//管理
Route::any('m_login',['uses'=>'ManageController@index']);
Route::any('m_main',['uses'=>'ManageController@i_main']);
Route::get('m_login_out',['uses'=>'ManageController@login_out']);
Route::get('m_content/{id?}',['uses'=>'ManageController@content']);
Route::get('m_detial/{id?}',['uses'=>'ManageController@detial']);
Route::any('m_upload',['uses'=>'ManageController@upload']);
Route::any('m_check',['uses'=>'ManageController@check']);
Route::get('m_update/{id?}',['uses'=>'ManageController@update']);
Route::get('m_delete/{id?}',['uses'=>'ManageController@delete']);
Route::get('m_access/{id?}',['uses'=>'ManageController@m_access']);
Route::get('m_ok/{id?}',['uses'=>'ManageController@m_ok']);


Route::get('/', function () {
    return view('Test/index');
});
