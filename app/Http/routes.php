<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {

    /*
     * Home
     */
    
    //Route::auth();
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);

    /*
     * Administration
     */

    Route::get('administration', ['as' => 'administration', function(){
        return view('administration.index');
    }]);
    Route::group(['prefix' => 'administration'], function(){
        Route::resource('companies', 'CompanyController');
        Route::group(['prefix' => 'companies'], function() {

            /* Upload images companies */
            Route::get('attachFiles/{id}', ['as' => 'administration.companies.attachFiles', 'uses' => 'CompanyController@getImages']);
            Route::post('attachFiles', ['as' => 'administration.companies.addImages', 'uses' => 'CompanyController@addImages']);
            Route::post('deleteFiles', ['as' => 'administration.companies.deleteFiles', 'uses' => 'CompanyController@deleteFiles']);
        });
    });

    /*
     * Humans-Resources
     */

    Route::get('human-resources', ['as' => 'human-resources', function(){
        return view('human-resources.index');
    }]);

    Route::group(['prefix' => 'human-resources'], function(){
        Route::resource('employees', 'EmployeeController');
        Route::get('api', function(){
            return Datatables::of(\Controlqtime\Core\Entities\Employee::all())->make(true);
        });
        Route::group(['prefix' => 'employees'], function(){

            /* Upload images employees */   
            Route::get('attachFiles/{id}', ['as' => 'human-resources.employees.attachFiles', 'uses' => 'EmployeeController@getImages']);
            Route::post('attachFiles', ['as' => 'human-resources.employees.addImages', 'uses' => 'EmployeeController@addImages']);
            Route::post('deleteFiles', ['as' => 'human-resources.employees.deleteFiles', 'uses' => 'EmployeeController@deleteFiles']);
            
            /* Employees create */
            Route::post('step1', ['as' => 'human-resources.employees.step1', 'uses' => 'EmployeeController@step1']);
            Route::post('step2', ['as' => 'human-resources.employees.step2', 'uses' => 'EmployeeController@step2']);
            Route::get('/session/destroyManpowerData', ['as' => 'destroyEmployeeData', 'uses' => 'EmployeeController@destroyEmployeeData']);

            /* Employees update */
            Route::put('updateStep1/{id}', ['as' => 'human-resources.employees.updateStep1', 'uses' => 'EmployeeController@updateStep1']);
            Route::put('updateStep2/{id}', ['as' => 'human-resources.employees.updateStep2', 'uses' => 'EmployeeController@updateStep2']);

            /* Daily Assistance */
            Route::post('startDailyAssistance', ['as' => 'human-resources.employees.startDailyAssistance', 'uses' => 'DailyAssistanceController@startAssistance']);
            Route::post('updateDailyAssistance', ['as' => 'human-resources.employees.updateDailyAssistance', 'uses' => 'DailyAssistanceController@updateAssistance']);
        });
    });

    /*
     * Operations
     */

    Route::get('operations', ['as' => 'operations', function(){
        return view('operations.index');
    }]);
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

    Route::get('maintainers', ['as' => 'maintainers', function(){
        return view('maintainers.index');
    }]);
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
        Route::resource('positions', 'PositionController');
        Route::resource('professions', 'ProfessionController');
        Route::resource('relationships', 'RelationshipController');
        Route::resource('routes', 'RouteController');
        Route::resource('labor-unions', 'LaborUnionController');
        Route::resource('terminals', 'TerminalController');
        Route::resource('trademarks', 'TrademarkController');
        Route::resource('type-certifications', 'TypeCertificationController');
        Route::resource('type-companies', 'TypeCompanyController');
        Route::resource('type-disabilities', 'TypeDisabilityController');
        Route::resource('type-diseases', 'TypeDiseaseController');
        Route::resource('type-exams', 'TypeExamController');
        Route::resource('type-institutions', 'TypeInstitutionController');
        Route::resource('type-professional-licenses', 'TypeProfessionalLicenseController');
        // Route::resource('type-represents', 'TypeRepresentController');
        Route::resource('type-specialities', 'TypeSpecialityController');
        Route::resource('type-vehicles', 'TypeVehicleController');
        Route::get('measuring-units', ['as' => 'maintainers.measuring-units', function(){
            return view('maintainers.measuring-units.index');
        }]);
        Route::group(['prefix' => 'measuring-units'], function() {
            Route::resource('weights', 'WeightController');
            Route::resource('engine-cubics', 'EngineCubicController');
        });
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
