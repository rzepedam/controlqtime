<?php

//Route::auth();
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);