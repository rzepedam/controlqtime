<?php

// SidebarMenu
Route::get('administration', 'SidebarMenuController@getAdministration')->name('administration');

// Administration
Route::group(['prefix' => 'administration'], function () {
    // Companies
    Route::get('getCompanies', ['as' => 'getCompanies', 'uses' => 'CompanyController@getCompanies']);
    Route::resource('companies', 'CompanyController');
    Route::group(['prefix' => 'companies'], function () {
        Route::get('attachFiles/{id}', ['as' => 'CompanyAttachFiles', 'uses' => 'CompanyController@getImages']);
        Route::post('attachFiles', ['as' => 'CompanyAddImages', 'uses' => 'CompanyController@addImages']);
        Route::post('deleteFiles', ['as' => 'CompanyDeleteFiles', 'uses' => 'CompanyController@deleteFiles']);
    });
});
