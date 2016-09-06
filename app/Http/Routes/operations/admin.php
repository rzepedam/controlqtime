<?php

// Index
Route::get('operations', ['as' => 'operations', function(){
	return view('operations.index');
}]);

// Operations
Route::group(['prefix' => 'operations'], function() {

	// Vehicles
	Route::get('getVehicles', ['as' => 'getVehicles', 'uses' => 'VehicleController@getVehicles']);
	Route::resource('vehicles', 'VehicleController');
	Route::group(['prefix' => 'vehicles'], function() {
		Route::get('attachFiles/{id}', ['as' => 'VehicleAttachFiles', 'uses' => 'VehicleController@getImages']);
		Route::post('attachFiles', ['as' => 'VehicleAddImages', 'uses' => 'VehicleController@addImages']);
		Route::post('deleteFiles', ['as' => 'VehicleDeleteFiles', 'uses' => 'VehicleController@deleteFiles']);
	});
});