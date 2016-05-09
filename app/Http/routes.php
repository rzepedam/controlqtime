<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    /*
     * Home
     */

    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);


    /*
     * Humans-Resources
     */

    Route::group(['prefix' => 'human-resources'], function(){

        Route::resource('manpowers', 'ManpowerController');
        Route::group(['prefix' => 'manpowers'], function(){
            
            /* Manpowers create */
            Route::post('step1', ['as' => 'human-resources.manpowers.step1', 'uses' => 'ManpowerController@step1']);
            Route::post('step2', ['as' => 'human-resources.manpowers.step2', 'uses' => 'ManpowerController@step2']);
            Route::get('/session/destroyManpowerData', ['as' => 'destroyManpowerData', 'uses' => 'ManpowerController@destroyManpowerData']);

            /* Manpowers update */
            Route::put('updateStep1/{id}', ['as' => 'human-resources.manpowers.updateStep1', 'uses' => 'ManpowerController@updateStep1']);

            /* Daily Assistance */
            Route::post('startDailyAssistance', ['as' => 'human-resources.manpowers.startDailyAssistance', 'uses' => 'DailyAssistanceController@startAssistance']);
            Route::post('updateDailyAssistance', ['as' => 'human-resources.manpowers.updateDailyAssistance', 'uses' => 'DailyAssistanceController@updateAssistance']);
        });
    });


    /*
     * Operaciones
     */

    Route::group(['prefix' => 'operations'], function() {

        Route::resource('route-sheets', 'RouteSheetController');
        Route::post('route-sheets/changeStateRoundSheet', ['as' => 'operations.route-sheets.changeStateRoundSheet', 'uses' => 'RouteSheetController@changeStateRoundSheet']);
        Route::resource('rounds', 'RoundController');

    });

    /*
     * Maintainers
     */

    Route::group(['prefix' => 'maintainers'], function() {

        Route::resource('areas', 'AreaController');
        Route::resource('cities', 'CityController');
        Route::resource('companies', 'CompanyController');
        Route::group(['prefix' => 'companies'], function() {
            Route::get('attachFiles/{id}', ['as' => 'maintainers.companies.attachFiles', 'uses' => 'CompanyController@getImages']);
            Route::post('attachFiles', ['as' => 'maintainers.companies.addImages', 'uses' => 'CompanyController@addImages']);
            Route::post('deleteFiles', ['as' => 'maintainers.companies.deleteFiles', 'uses' => 'CompanyController@deleteFiles']);
        });
        Route::resource('countries', 'CountryController');
        Route::resource('degrees', 'DegreeController');
        Route::resource('forecasts', 'ForecastController');
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
        Route::resource('type-disabilities', 'TypeDisabilityController');
        Route::resource('type-diseases', 'TypeDiseaseController');
        Route::resource('type-exams', 'TypeExamController');
        Route::resource('type-institutions', 'TypeInstitutionController');
        Route::resource('type-professional-licenses', 'TypeProfessionalLicenseController');
        Route::resource('type-specialities', 'TypeSpecialityController');
        Route::resource('type-vehicles', 'TypeVehicleController');
        Route::resource('vehicles', 'VehicleController');
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

