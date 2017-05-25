<?php

// Index
Route::get('sign-in-visits', ['as' => 'sign-in-visits', function () {
    return view('sign-in-visits.index');
}, ]);

// Sign In Visit
Route::group(['prefix' => 'sign-in-visits'], function () {
	// Visit
	Route::get('visit-authorization', 'VisitController@authorization');
	Route::get('getVisits', ['as' => 'getVisits', 'uses' => 'VisitController@getVisits']);
	Route::post('visitAddPhotos', ['as' => 'sign-in-visits.visitAddPhotos', 'uses' => 'VisitController@addPhotos']);
    Route::resource('visits', 'VisitController');
});
