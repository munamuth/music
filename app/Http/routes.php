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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['web'] ], function() {
	Route::get('/','MyHomeController@index');
	Route::get('/musicall','MyHomeController@all');
});

Route::group(['middleware' => ['web'] ], function() {
	Route::get('/admin/music','MusicController@index');
	Route::get('/admin/music/show/{id}','MusicController@show');
	Route::post('/admin/music/store','MusicController@store');
	Route::get('/admin/music/all','MusicController@all');
});


Route::group(['middleware' => ['web'] ], function() {
	Route::get('/admin/singer','SingerController@index');
	Route::post('/admin/singer/store','SingerController@store');
	Route::get('/admin/singer/all','MusicController@all');
});

Route::group(['middleware' => ['web'] ], function() {
	Route::get('/admin/production','ProductionController@index');
	Route::post('/admin/production/store','ProductionController@store');
	Route::get('/admin/production/all','ProductionController@all');
});

Route::auth();

Route::get('/home', 'HomeController@index');
