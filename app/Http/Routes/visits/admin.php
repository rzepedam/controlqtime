<?php

Route::get('visits', ['as' => 'visits', function ()
{
	return view('visits.index');
}]);

Route::group(['prefix' => 'visits'], function ()
{
	Route::get('getSignInVisits', ['as' => 'getSignInVisits', 'uses' => 'SignInVisitController@getSignInVisits']);
	Route::resource('sign-in-visits', 'SignInVisitController');
	Route::group(['prefix' => 'sign-in-visits'], function ()
	{
		Route::post('addPhotos/{id}', ['as' => 'visitsAddPhotos', 'uses' => 'SignInVisitController@addPhotos']);
	});
});