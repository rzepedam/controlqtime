<?php

// Index
Route::get('human-resources', 'SidebarMenuController@getHumanResources')->name('human-resources');

// Human-Resources
Route::group(['prefix' => 'human-resources'], function () {
    // Daily assistances
	Route::get('getAssistances', 'DailyAssistanceController@getAssistances');
	Route::get('daily-assistances/loadEmployee', 'DailyAssistanceController@loadEmployee');
	Route::get('daily-assistances/loadCompany', 'DailyAssistanceController@loadCompany');
	Route::get('daily-assistances/loadArea', 'DailyAssistanceController@loadArea');
	Route::resource('daily-assistances', 'DailyAssistanceController');

    // Contracts
    Route::get('getContracts', ['as' => 'getContracts', 'uses' => 'ContractController@getContracts']);
    Route::resource('contracts', 'ContractController');
    Route::group(['prefix' => 'contracts'], function () {
        Route::post('loadDataPreviewContract', ['as' => 'loadDataPreviewContract', 'uses' => 'ContractController@loadDataPreviewContract']);
        Route::get('getPdf/{id}', ['as' => 'getPdf', 'uses' => 'ContractController@getPdf']);
    });

    // Employees
    Route::get('getEmployees', ['as' => 'getEmployees', 'uses' => 'EmployeeController@getEmployees']);
	Route::get('getShowAssistance', ['as' => 'getShowAssistance', 'uses' => 'EmployeeController@getShowAssistance']);
	Route::resource('employees', 'EmployeeController');
	Route::group(['prefix' => 'employees'], function () {
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

    // Remuneration
    Route::get('remunerations', 'RemunerationController@index');
    Route::group(['prefix' => 'remunerations'], function () {
        Route::post('loadDataForEmployeeSelected', 'RemunerationController@loadDataForEmployeeSelected');
    });
});
