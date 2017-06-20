<?php

// SidebarMenu
Route::get('sign-in-visits', 'SidebarMenuController@getSignInVisits')->name('sign-in-visits');

// Sign In Visit
Route::group(['prefix' => 'sign-in-visits'], function () {
    // Visit
    Route::get('visit-authorization', 'VisitController@authorization');
    Route::get('getVisits', ['as' => 'getVisits', 'uses' => 'VisitController@getVisits']);
    Route::post('visitAddPhotos', ['as' => 'sign-in-visits.visitAddPhotos', 'uses' => 'VisitController@addPhotos']);
    Route::resource('visits', 'VisitController');
});
