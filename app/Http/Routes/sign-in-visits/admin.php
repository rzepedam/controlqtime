<?php

Route::get('sign-in-visits', ['as' => 'sign-in-visits', function () {
    return view('sign-in-visits.index');
}, ]);

Route::group(['prefix' => 'sign-in-visits'], function () {
    Route::resource('visits', 'VisitController');
	Route::group(['prefix' => 'visits'], function () {
        Route::get('getVisits', ['as' => 'getVisits', 'uses' => 'VisitController@getVisits']);
		Route::resource('form-visits', 'FormVisitController');
		Route::post('addImages', ['as' => 'VisitAddImages', 'uses' => 'FormVisitController@addImages']);
		Route::post('deleteImages', ['as' => 'VisitDeleteImages', 'uses' => 'FormVisitController@deleteImages']);
	});
});
