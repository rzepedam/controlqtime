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

    Route::get('/', function () {
        return view('layout.index');
    });

    /***************************************
     *********** Humans-Resources **********
     ***************************************/
    Route::group(['prefix' => 'human-resources'], function(){

        Route::get('/', function(){
            return view('human-resources.index');
        });

        Route::resource('manpowers', 'ManpowerController');

        //Routes for Form Wizard
        Route::group(['prefix' => 'manpowers'], function(){
            Route::post('step1', ['as' => 'human-resources.manpowers.step1', 'uses' => 'ManpowerController@step1']);
            Route::post('step2', ['as' => 'human-resources.manpowers.step2', 'uses' => 'ManpowerController@step2']);
            Route::post('step3', ['as' => 'human-resources.manpowers.step3', 'uses' => 'ManpowerController@step3']);
            Route::post('storage', ['as' => 'human-resources.manpowers.storage', 'uses' => 'StorageController@saveTempImg']);
            Route::post('deleteImg/{id}', ['as' => 'human-resources.manpowers.deleteImg/{id}', 'uses' => 'StorageController@deleteImg']);
        });
    });


    /**********************************
     *********** Maintainers **********
     **********************************/
    Route::group(['prefix' => 'maintainers'], function() {

        Route::get('/', function(){
            return view('maintainers.index');
        });

        Route::resource('certifications', 'CertificationController');
        Route::resource('countries', 'CountryController');
        Route::resource('disabilities', 'DisabilityController');
        Route::resource('diseases', 'DiseaseController');
        Route::resource('forecasts', 'ForecastController');
        Route::resource('institutions', 'InstitutionController');
        Route::resource('kins', 'KinController');
        Route::resource('ratings', 'RatingController');
        Route::resource('type-institutions', 'TypeInstitutionController');
        Route::resource('specialities', 'SpecialityController');
        Route::resource('licenses', 'LicenseController');
        Route::resource('professions', 'ProfessionController');
    });



});

