<?php

// Contracts
Route::get('contracts', ['as' => 'maintainers.contracts', function(){
	return view('maintainers.contracts.index');
}]);

Route::group(['prefix' => 'contracts'], function() {

	// Num-hours
	Route::get('getNumHours', ['as' => 'maintainers.contracts.getNumHours', 'uses' => 'NumHourController@getNumHours']);
	Route::resource('num-hours', 'NumHourController');

	//  Periodicities
	/*Route::get('getPeriodicities', ['as' => 'maintainers.periodicities.getPeriodicities', 'uses' => 'PeriodicityController@getPeriodicities']);
	Route::resource('periodicities', 'PeriodicityController');

	// Day-trip
	Route::get('getDayTrips', ['as' => 'maintainers.day-trips.getDayTrips', 'uses' => 'DayTripController@getDayTrips']);
	Route::resource('day-trips', 'DayTripController');

	// Schedules
	Route::get('getSchedules', ['as' => 'maintainers.schedules.getSchedules', 'uses' => 'ScheduleController@getSchedules']);
	Route::resource('schedules', 'ScheduleController');*/

});