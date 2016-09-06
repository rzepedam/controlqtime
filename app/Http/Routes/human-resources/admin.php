<?php

// Index
Route::get('human-resources', ['as' => 'human-resources', function(){
	return view('human-resources.index');
}]);

// Human-Resources
Route::group(['prefix' => 'human-resources'], function(){

	// Employees
	Route::get('getEmployees', ['as' => 'getEmployees', 'uses' => 'EmployeeController@getEmployees']);
	Route::resource('employees', 'EmployeeController');
	Route::group(['prefix' => 'employees'], function(){

		/* Upload Images */
		Route::get('attachFiles/{id}', ['as' => 'EmployeeAttachFiles', 'uses' => 'EmployeeController@getImages']);
		Route::post('attachFiles', ['as' => 'EmployeeAddImages', 'uses' => 'EmployeeController@addImages']);
		Route::post('deleteFiles', ['as' => 'EmployeeDeleteFiles', 'uses' => 'EmployeeController@deleteFiles']);

		/* Employees create step-by-step */
		Route::post('step1', ['as' => 'step1', 'uses' => 'EmployeeController@step1']);
		Route::post('step2', ['as' => 'step2', 'uses' => 'EmployeeController@step2']);
		Route::get('/session/destroySessionStoreEmployee', ['as' => 'destroySessionStoreEmployee', 'uses' => 'EmployeeController@destroySessionStoreEmployee']);

		/* Employees update step-by-step */
		Route::put('updateSessionStep1/{id}', ['as' => 'updateSessionStep1', 'uses' => 'EmployeeController@updateSessionStep1']);
		Route::put('updateSessionStep2/{id}', ['as' => 'updateSessionStep2', 'uses' => 'EmployeeController@updateSessionStep2']);
		Route::get('/session/destroySessionUpdateEmployee', ['as' => 'destroySessionUpdateEmployee', 'uses' => 'EmployeeController@destroySessionUpdateEmployee']);

	});

	// Access Controls
	Route::get('getAccessControls', ['as' => 'getAccessControls', 'uses' => 'AccessControlController@getAccessControls']);
	Route::resource('access-controls', 'AccessControlController');

	// Contracts
	Route::get('getContracts', ['as' => 'getContracts', 'uses' => 'ContractController@getContracts']);
	Route::resource('contracts', 'ContractController');
	Route::group(['prefix' => 'contracts'], function() {
		Route::get('getPdf/{id}', ['as' => 'getPdf', 'uses' => 'ContractController@getPdf']);
	});

});
