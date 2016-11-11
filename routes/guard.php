<?php

Auth::routes();

Route::get('/', function(){
	return view('errors.503');
});

Route::get('/home', 'HomeController@index');