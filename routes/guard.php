<?php

Auth::routes();

Route::get('/', function () {
    return view('home.guest');
});
