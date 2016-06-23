<?php

// Index
Route::get('operations', ['as' => 'operations', function(){
	return view('operations.index');
}]);

// Operations
Route::group(['prefix' => 'operations'], function() {

	// Route-Sheet
	Route::resource('route-sheets', 'RouteSheetController');
	Route::post('route-sheets/changeStateRoundSheet', ['as' => 'operations.route-sheets.changeStateRoundSheet', 'uses' => 'RouteSheetController@changeStateRoundSheet']);
	Route::resource('rounds', 'RoundController');

	// Vehicles
	Route::get('getVehicles', ['as' => 'operations.getVehicles', 'uses' => 'VehicleController@getVehicles']);
	Route::resource('vehicles', 'VehicleController');
	Route::group(['prefix' => 'vehicles'], function() {
		Route::get('attachFiles/{id}', ['as' => 'operations.vehicles.attachFiles', 'uses' => 'VehicleController@getImages']);
		Route::post('attachFiles', ['as' => 'operations.vehicles.addImages', 'uses' => 'VehicleController@addImages']);
		Route::post('deleteFiles', ['as' => 'operations.vehicles.deleteFiles', 'uses' => 'VehicleController@deleteFiles']);
	});
});