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
Route::get('/','Front\FrontController@getHome');

Route::group(['prefix'=>'admin'], function(){
//    Route::controllers([
//        '/' => 'Auth\AuthController'
//    ]);
    Route::resource('notices','Admin\NoticesController');
});

Route::controllers([
    '/' => 'Front\FrontController',
	'password' => 'Auth\PasswordController',
]);
