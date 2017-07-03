<?php

// SidebarMenu
Route::get('graphics', 'SidebarMenuController@getGraphics')->name('graphics');

// Graphics
Route::group(['prefix' => 'graphics'], function () {
	Route::get('assistances', 'Graphics\AssistanceController@index');
	Route::get('changeDateInput', 'Graphics\AssistanceController@changeDateInput');
	Route::get('changeCompanySelect', 'Graphics\AssistanceController@changeCompanySelect');
	Route::get('changeAreaSelect', 'Graphics\AssistanceController@changeAreaSelect');
});