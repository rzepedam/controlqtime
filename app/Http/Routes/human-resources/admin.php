<?php

// Index
Route::get('human-resources', ['as' => 'human-resources', function(){
	return view('human-resources.index');
}]);

// Human-Resources
Route::group(['prefix' => 'human-resources'], function(){

	// Employees
	Route::get('getEmployees', ['as' => 'human-resources.getEmployees', 'uses' => 'EmployeeController@getEmployees']);
	Route::resource('employees', 'EmployeeController');
	Route::group(['prefix' => 'employees'], function(){

		/* Upload Images */
		Route::get('attachFiles/{id}', ['as' => 'human-resources.employees.attachFiles', 'uses' => 'EmployeeController@getImages']);
		Route::post('attachFiles', ['as' => 'human-resources.employees.addImages', 'uses' => 'EmployeeController@addImages']);
		Route::post('deleteFiles', ['as' => 'human-resources.employees.deleteFiles', 'uses' => 'EmployeeController@deleteFiles']);

		/* Employees create step-by-step */
		Route::post('step1', ['as' => 'human-resources.employees.step1', 'uses' => 'EmployeeController@step1']);
		Route::post('step2', ['as' => 'human-resources.employees.step2', 'uses' => 'EmployeeController@step2']);
		Route::get('/session/destroySessionStoreEmployee', ['as' => 'destroySessionStoreEmployee', 'uses' => 'EmployeeController@destroySessionStoreEmployee']);

		/* Employees update step-by-step */
		Route::put('updateSessionStep1/{id}', ['as' => 'human-resources.employees.updateSessionStep1', 'uses' => 'EmployeeController@updateSessionStep1']);
		Route::put('updateSessionStep2/{id}', ['as' => 'human-resources.employees.updateSessionStep2', 'uses' => 'EmployeeController@updateSessionStep2']);
		Route::get('/session/destroySessionUpdateEmployee', ['as' => 'destroySessionUpdateEmployee', 'uses' => 'EmployeeController@destroySessionUpdateEmployee']);

		/* Daily Assistance */
		Route::post('startDailyAssistance', ['as' => 'human-resources.employees.startDailyAssistance', 'uses' => 'DailyAssistanceController@startAssistance']);
		Route::post('updateDailyAssistance', ['as' => 'human-resources.employees.updateDailyAssistance', 'uses' => 'DailyAssistanceController@updateAssistance']);
	});
});
