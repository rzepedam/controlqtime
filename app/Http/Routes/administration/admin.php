<?php

// Index
Route::get('administration', ['as' => 'administration', function(){
	return view('administration.index');
}]);

// Administration
Route::group(['prefix' => 'administration'], function(){

	// Companies
	Route::get('getCompanies', ['as' => 'administration.getCompanies', 'uses' => 'CompanyController@getCompanies']);
	Route::resource('companies', 'CompanyController');
	Route::group(['prefix' => 'companies'], function() {
		Route::get('attachFiles/{id}', ['as' => 'administration.companies.attachFiles', 'uses' => 'CompanyController@getImages']);
		Route::post('attachFiles', ['as' => 'administration.companies.addImages', 'uses' => 'CompanyController@addImages']);
		Route::post('deleteFiles', ['as' => 'administration.companies.deleteFiles', 'uses' => 'CompanyController@deleteFiles']);
	});
});