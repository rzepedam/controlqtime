<?php

// Index
Route::get('maintainers', ['as' => 'maintainers', function(){
	return view('maintainers.index');
}]);

// Features List
Route::group(['prefix' => 'maintainers'], function() {

	// Areas
	Route::get('getAreas', ['as' => 'maintainers.getAreas', 'uses' => 'AreaController@getAreas']);
	Route::resource('areas', 'AreaController');

	// Cities
	Route::get('getCities', ['as' => 'maintainers.getCities', 'uses' => 'CityController@getCities']);
	Route::resource('cities', 'CityController');

	// Countries
	Route::get('getCountries', ['as' => 'maintainers.getCountries', 'uses' => 'CountryController@getCountries']);
	Route::resource('countries', 'CountryController');

	// Day-trip
	Route::get('getDayTrips', ['as' => 'maintainers.day-trips.getDayTrips', 'uses' => 'DayTripController@getDayTrips']);
	Route::resource('day-trips', 'DayTripController');

	// Degrees
	Route::get('getDegrees', ['as' => 'maintainers.getDegrees', 'uses' => 'DegreeController@getDegrees']);
	Route::resource('degrees', 'DegreeController');

	// Forecasts
	Route::get('getForecasts', ['as' => 'maintainers.getForecasts', 'uses' => 'ForecastController@getForecasts']);
	Route::resource('forecasts', 'ForecastController');

	// Fuels
	Route::get('getFuels', ['as' => 'maintainers.getFuels', 'uses' => 'FuelController@getFuels']);
	Route::resource('fuels', 'FuelController');

	// Institutions
	Route::get('getInstitutions', ['as' => 'maintainers.getInstitutions', 'uses' => 'InstitutionController@getInstitutions']);
	Route::resource('institutions', 'InstitutionController');

	// Measuring-Units
	require __DIR__ . '/measuring-units/route.php';

	// Model-Vehicles
	Route::get('getModelVehicles', ['as' => 'maintainers.getModelVehicles', 'uses' => 'ModelVehicleController@getModelVehicles']);
	Route::resource('model-vehicles', 'ModelVehicleController');

	// Mutualities
	Route::get('getMutualities', ['as' => 'maintainers.getMutualities', 'uses' => 'MutualityController@getMutualities']);
	Route::resource('mutualities', 'MutualityController');

	// Num-hours
	Route::get('getNumHours', ['as' => 'maintainers.contracts.getNumHours', 'uses' => 'NumHourController@getNumHours']);
	Route::resource('num-hours', 'NumHourController');

	// Pensions
	Route::get('getPensions', ['as' => 'maintainers.getPensions', 'uses' => 'PensionController@getPensions']);
	Route::resource('pensions', 'PensionController');

	// Periodicities
	Route::get('getPeriodicities', ['as' => 'maintainers.periodicities.getPeriodicities', 'uses' => 'PeriodicityController@getPeriodicities']);
	Route::resource('periodicities', 'PeriodicityController');

	// Positions
	Route::get('getPositions', ['as' => 'maintainers.getPositions', 'uses' => 'PositionController@getPositions']);
	Route::resource('positions', 'PositionController');

	// Professions
	Route::get('getProfessions', ['as' => 'maintainers.getProfessions', 'uses' => 'ProfessionController@getProfessions']);
	Route::resource('professions', 'ProfessionController');

	// Relationships
	Route::get('getRelationships', ['as' => 'maintainers.getRelationships', 'uses' => 'RelationshipController@getRelationships']);
	Route::resource('relationships', 'RelationshipController');

	// Routes
	Route::get('getRoutes', ['as' => 'maintainers.getRoutes', 'uses' => 'RouteController@getRoutes']);
	Route::resource('routes', 'RouteController');

	Route::resource('labor-unions', 'LaborUnionController');

	// Terminals
	Route::get('getTerminals', ['as' => 'maintainers.getTerminals', 'uses' => 'TerminalController@getTerminals']);
	Route::resource('terminals', 'TerminalController');

	// Trademarks
	Route::get('getTrademarks', ['as' => 'maintainers.getTrademarks', 'uses' => 'TrademarkController@getTrademarks']);
	Route::resource('trademarks', 'TrademarkController');

	// Type-Certifications
	Route::get('getTypeCertifications', ['as' => 'maintainers.getTypeCertifications', 'uses' => 'TypeCertificationController@getTypeCertifications']);
	Route::resource('type-certifications', 'TypeCertificationController');

	// Type-Companies
	Route::get('getTypeCompanies', ['as' => 'maintainers.getTypeCompanies', 'uses' => 'TypeCompanyController@getTypeCompanies']);
	Route::resource('type-companies', 'TypeCompanyController');

	// Type-Disabilities
	Route::get('getTypeDisabilities', ['as' => 'maintainers.getTypeDisabilities', 'uses' => 'TypeDisabilityController@getTypeDisabilities']);
	Route::resource('type-disabilities', 'TypeDisabilityController');

	// Type-Diseases
	Route::get('getTypeDiseases', ['as' => 'maintainers.getTypeDiseases', 'uses' => 'TypeDiseaseController@getTypeDiseases']);
	Route::resource('type-diseases', 'TypeDiseaseController');

	// Type-Exams
	Route::get('getTypeExams', ['as' => 'maintainers.getTypeExams', 'uses' => 'TypeExamController@getTypeExams']);
	Route::resource('type-exams', 'TypeExamController');

	// Type-Institutions
	Route::get('getTypeInstitutions', ['as' => 'maintainers.getTypeInstitutions', 'uses' => 'TypeInstitutionController@getTypeInstitutions']);
	Route::resource('type-institutions', 'TypeInstitutionController');

	// Type-Professional-Licenses
	Route::get('getTypeProfessionalLicenses', ['as' => 'maintainers.getTypeProfessionalLicenses', 'uses' => 'TypeProfessionalLicenseController@getTypeProfessionalLicenses']);
	Route::resource('type-professional-licenses', 'TypeProfessionalLicenseController');

	// Type-Representatives
	Route::get('getTypeRepresentatives', ['as' => 'maintainers.getTypeRepresentatives', 'uses' => 'TypeRepresentativeController@getTypeRepresentatives']);
	Route::resource('type-representatives', 'TypeRepresentativeController');

	// Type-Specialities
	Route::get('getTypeSpecialities', ['as' => 'maintainers.getTypeSpecialities', 'uses' => 'TypeSpecialityController@getTypeSpecialities']);
	Route::resource('type-specialities', 'TypeSpecialityController');

	// Type-Vehicles
	Route::get('getTypeVehicles', ['as' => 'maintainers.getTypeVehicles', 'uses' => 'TypeVehicleController@getTypeVehicles']);
	Route::resource('type-vehicles', 'TypeVehicleController');

});