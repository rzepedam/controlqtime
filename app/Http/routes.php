<?php

Route::group(['middleware' => ['web']], function () {

    /*
     * Home
     */
    //Route::auth();
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    /*
     * Administration
     */

    Route::group(['prefix' => 'administration'], function(){

        Route::resource('companies', 'CompanyController');
        Route::group(['prefix' => 'companies'], function() {
            Route::get('attachFiles/{id}', ['as' => 'administration.companies.attachFiles', 'uses' => 'CompanyController@getImages']);
            Route::post('attachFiles', ['as' => 'administration.companies.addImages', 'uses' => 'CompanyController@addImages']);
            Route::post('deleteFiles', ['as' => 'administration.companies.deleteFiles', 'uses' => 'CompanyController@deleteFiles']);
        });

    });

    /*
     * Humans-Resources
     */

    Route::group(['prefix' => 'human-resources'], function(){

        Route::resource('employees', 'EmployeeController');
        Route::group(['prefix' => 'employees'], function(){
            
            /* Employees create */
            Route::post('step1', ['as' => 'human-resources.employees.step1', 'uses' => 'EmployeeController@step1']);
            Route::post('step2', ['as' => 'human-resources.employees.step2', 'uses' => 'EmployeeController@step2']);
            Route::get('/session/destroyManpowerData', ['as' => 'destroyManpowerData', 'uses' => 'EmployeeController@destroyManpowerData']);

            /* Employees update */
            Route::put('updateStep1/{id}', ['as' => 'human-resources.employees.updateStep1', 'uses' => 'EmployeeController@updateStep1']);

            /* Daily Assistance */
            Route::post('startDailyAssistance', ['as' => 'human-resources.employees.startDailyAssistance', 'uses' => 'DailyAssistanceController@startAssistance']);
            Route::post('updateDailyAssistance', ['as' => 'human-resources.employees.updateDailyAssistance', 'uses' => 'DailyAssistanceController@updateAssistance']);
        });
    });

    /*
     * Operations
     */

    Route::group(['prefix' => 'operations'], function() {

        Route::resource('route-sheets', 'RouteSheetController');
        Route::post('route-sheets/changeStateRoundSheet', ['as' => 'operations.route-sheets.changeStateRoundSheet', 'uses' => 'RouteSheetController@changeStateRoundSheet']);
        Route::resource('rounds', 'RoundController');
        Route::resource('vehicles', 'VehicleController');
        Route::group(['prefix' => 'vehicles'], function() {
            Route::get('attachFiles/{id}', ['as' => 'operations.vehicles.attachFiles', 'uses' => 'VehicleController@getImages']);
            Route::post('attachFiles', ['as' => 'operations.vehicles.addImages', 'uses' => 'VehicleController@addImages']);
            Route::post('deleteFiles', ['as' => 'operations.vehicles.deleteFiles', 'uses' => 'VehicleController@deleteFiles']);
        });
    });

    /*
     * Maintainers
     */

    Route::group(['prefix' => 'maintainers'], function() {

        Route::resource('areas', 'AreaController');
        Route::resource('cities', 'CityController');
        Route::resource('countries', 'CountryController');
        Route::resource('degrees', 'DegreeController');
        Route::resource('forecasts', 'ForecastController');
        Route::resource('fuels', 'FuelController');
        Route::resource('institutions', 'InstitutionController');
        Route::resource('model-vehicles', 'ModelVehicleController');
        Route::resource('mutualities', 'MutualityController');
        Route::resource('pensions', 'PensionController');
        Route::resource('professions', 'ProfessionController');
        Route::resource('roles', 'RoleController');
        Route::resource('relationships', 'RelationshipController');
        Route::resource('routes', 'RouteController');
        Route::resource('terminals', 'TerminalController');
        Route::resource('trademarks', 'TrademarkController');
        Route::resource('type-certifications', 'TypeCertificationController');
        Route::resource('type-companies', 'TypeCompanyController');
        Route::resource('type-disabilities', 'TypeDisabilityController');
        Route::resource('type-diseases', 'TypeDiseaseController');
        Route::resource('type-exams', 'TypeExamController');
        Route::resource('type-institutions', 'TypeInstitutionController');
        Route::resource('type-professional-licenses', 'TypeProfessionalLicenseController');
        Route::resource('type-specialities', 'TypeSpecialityController');
        Route::resource('type-vehicles', 'TypeVehicleController');
    });

    /*
     * Ajax Controller
     */

    Route::post('loadProvinces', 'AjaxLoadController@loadProvinces');
    Route::post('loadCommunes', 'AjaxLoadController@loadCommunes');
    Route::post('verificaEmail', 'AjaxLoadController@verificaEmail');
    Route::post('loadModelVehicles', 'AjaxLoadController@loadModelVehicles');
    Route::post('loadRouteAndVehicleSelectedInRound', 'AjaxLoadController@loadRouteAndVehicleSelectedInRound');

});
