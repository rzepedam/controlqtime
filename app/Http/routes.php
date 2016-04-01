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
     *  Humans-Resources
     */

    Route::group(['prefix' => 'human-resources'], function(){

        Route::resource('manpowers', 'ManpowerController');
        Route::group(['prefix' => 'manpowers'], function(){
            Route::post('step1', ['as' => 'human-resources.manpowers.step1', 'uses' => 'ManpowerController@step1']);
            Route::post('step2', ['as' => 'human-resources.manpowers.step2', 'uses' => 'ManpowerController@step2']);
        });

    });


    /*
     * Maintainers
     */

    Route::group(['prefix' => 'maintainers'], function() {

        Route::resource('areas', 'AreaController');
        Route::resource('certifications', 'CertificationController');
        Route::resource('cities', 'CityController');
        Route::resource('companies', 'CompanyController');
        Route::resource('countries', 'CountryController');
        Route::resource('degrees', 'DegreeController');
        Route::resource('disabilities', 'DisabilityController');
        Route::resource('diseases', 'DiseaseController');
        Route::resource('exams', 'ExamController');
        Route::resource('forecasts', 'ForecastController');
        Route::resource('institutions', 'InstitutionController');
        Route::resource('relationships', 'RelationshipController');
        Route::resource('professional_licenses', 'ProfessionalLicenseController');
        Route::resource('mutualities', 'MutualityController');
        Route::resource('pensions', 'PensionController');
        Route::resource('professions', 'ProfessionController');
        Route::resource('ratings', 'RatingController');
        Route::resource('specialities', 'SpecialityController');
        Route::resource('type-institutions', 'TypeInstitutionController');
        
    });


    /*
     * Others
     */

    Route::get('attachFiles/{id}', ['as' => 'attachFiles', 'uses' => 'UploadController@getUpload']);
    Route::post('attachFiles', ['as' => 'attachFiles_added', 'uses' => 'UploadController@addFiles']);
    Route::post('deleteFiles', ['as' => 'deleteFiles', 'uses' => 'UploadController@deleteFiles']);


    /*
     * Ajax Functions
     */

    Route::post('loadProvinces/', 'AjaxLoadController@loadProvinces');
    Route::post('loadCommunes', 'AjaxLoadController@loadCommunes');
    Route::post('verificaEmail/', 'AjaxLoadController@verificaEmail');

});

