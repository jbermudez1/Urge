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

// Routes for filter and search
Route::post('/guias','Front\FrontController@getGuias');
Route::get('/guias/{id}','Front\FrontController@getGuiaUnica');

Route::group(['prefix'=>'admin','middleware'=>'auth','namespace'=>'Admin'], function(){
    Route::get('/','AdminController@index');

    Route::get('guidelines/create','GuidelinesController@getCreate');
    Route::post('guidelines/create','GuidelinesController@postCreate');
    Route::get('guidelines/','GuidelinesController@getList');
    Route::get('guidelines/{id}','GuidelinesController@getDetail');
    Route::get('guidelines/loadGuides/{id}','GuidelinesController@getGuides');

    Route::resource('categoryguides','CategoryGuidesController');
    Route::resource('guides','GuidesController');
    Route::resource('notices','NoticesController');
    Route::resource('procedures','ProceduresController');
    Route::resource('towns','TownsController');
    Route::resource('users','UsersController');
});

Route::controllers([
    'admin' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    '/' => 'Front\FrontController',
]);