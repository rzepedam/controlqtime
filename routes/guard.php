<?php

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm');
