<?php

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('/', function(){
	return view('errors.503');
});

Route::get('/home', 'HomeController@index');
