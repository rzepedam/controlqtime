<?php

// Index
Route::get('maintainers', ['as' => 'maintainers', function(){
	return view('maintainers.index');
}]);

// Features List
Route::group(['prefix' => 'maintainers'], function() {

	// Areas
	Route::get('getAreas', ['as' => 'getAreas', 'uses' => 'AreaController@getAreas']);
	Route::resource('areas', 'AreaController');

	// Cities
	Route::get('getCities', ['as' => 'getCities', 'uses' => 'CityController@getCities']);
	Route::resource('cities', 'CityController');

	// Countries
	Route::get('getCountries', ['as' => 'getCountries', 'uses' => 'CountryController@getCountries']);
	Route::resource('countries', 'CountryController');

	// Day-trip
	Route::get('getDayTrips', ['as' => 'day-trips.getDayTrips', 'uses' => 'DayTripController@getDayTrips']);
	Route::resource('day-trips', 'DayTripController');

	// Degrees
	Route::get('getDegrees', ['as' => 'getDegrees', 'uses' => 'DegreeController@getDegrees']);
	Route::resource('degrees', 'DegreeController');

	// Forecasts
	Route::get('getForecasts', ['as' => 'getForecasts', 'uses' => 'ForecastController@getForecasts']);
	Route::resource('forecasts', 'ForecastController');

	// Fuels
	Route::get('getFuels', ['as' => 'getFuels', 'uses' => 'FuelController@getFuels']);
	Route::resource('fuels', 'FuelController');

	// Gratifications
	Route::get('getGratifications', ['as' => 'getGratifications', 'uses' => 'GratificationController@getGratifications']);
	Route::resource('gratifications', 'GratificationController');

	// Institutions
	Route::get('getInstitutions', ['as' => 'getInstitutions', 'uses' => 'InstitutionController@getInstitutions']);
	Route::resource('institutions', 'InstitutionController');

	// Marital Statuses
	Route::get('getMaritalStatuses', ['as' => 'getMaritalStatuses', 'uses' => 'MaritalStatusController@getMaritalStatuses']);
	Route::resource('marital-statuses', 'MaritalStatusController');

	// Measuring-Units
	require __DIR__ . '/measuring-units/route.php';

	// Model-Vehicles
	Route::get('getModelVehicles', ['as' => 'getModelVehicles', 'uses' => 'ModelVehicleController@getModelVehicles']);
	Route::resource('model-vehicles', 'ModelVehicleController');

	// Mutualities
	Route::get('getMutualities', ['as' => 'getMutualities', 'uses' => 'MutualityController@getMutualities']);
	Route::resource('mutualities', 'MutualityController');

	// Num-hours
	Route::get('getNumHours', ['as' => 'contracts.getNumHours', 'uses' => 'NumHourController@getNumHours']);
	Route::resource('num-hours', 'NumHourController');

	// Pensions
	Route::get('getPensions', ['as' => 'getPensions', 'uses' => 'PensionController@getPensions']);
	Route::resource('pensions', 'PensionController');

	// Periodicities
	Route::get('getPeriodicities', ['as' => 'periodicities.getPeriodicities', 'uses' => 'PeriodicityController@getPeriodicities']);
	Route::resource('periodicities', 'PeriodicityController');

	// Positions
	Route::get('getPositions', ['as' => 'getPositions', 'uses' => 'PositionController@getPositions']);
	Route::resource('positions', 'PositionController');

	// Professions
	Route::get('getProfessions', ['as' => 'getProfessions', 'uses' => 'ProfessionController@getProfessions']);
	Route::resource('professions', 'ProfessionController');

	// Relationships
	Route::get('getRelationships', ['as' => 'getRelationships', 'uses' => 'RelationshipController@getRelationships']);
	Route::resource('relationships', 'RelationshipController');

	// Routes
	Route::get('getRoutes', ['as' => 'getRoutes', 'uses' => 'RouteController@getRoutes']);
	Route::resource('routes', 'RouteController');

	Route::resource('labor-unions', 'LaborUnionController');

	// Terminals
	Route::get('getTerminals', ['as' => 'getTerminals', 'uses' => 'TerminalController@getTerminals']);
	Route::resource('terminals', 'TerminalController');

	// Terms and Obligatories
	Route::get('getTermsAndObligatories', ['as' => 'getTermsAndObligatories', 'uses' => 'TermAndObligatoryController@getTermsAndObligatories']);
	Route::resource('terms-and-obligatories', 'TermAndObligatoryController');

	// Trademarks
	Route::get('getTrademarks', ['as' => 'getTrademarks', 'uses' => 'TrademarkController@getTrademarks']);
	Route::resource('trademarks', 'TrademarkController');

	// Type-Certifications
	Route::get('getTypeCertifications', ['as' => 'getTypeCertifications', 'uses' => 'TypeCertificationController@getTypeCertifications']);
	Route::resource('type-certifications', 'TypeCertificationController');

	// Type-Companies
	Route::get('getTypeCompanies', ['as' => 'getTypeCompanies', 'uses' => 'TypeCompanyController@getTypeCompanies']);
	Route::resource('type-companies', 'TypeCompanyController');

	// Type Contract
	Route::get('getTypeContracts', ['as' => 'getTypeContracts', 'uses' => 'TypeContractController@getTypeContracts']);
	Route::resource('type-contracts', 'TypeContractController');

	// Type-Disabilities
	Route::get('getTypeDisabilities', ['as' => 'getTypeDisabilities', 'uses' => 'TypeDisabilityController@getTypeDisabilities']);
	Route::resource('type-disabilities', 'TypeDisabilityController');

	// Type-Diseases
	Route::get('getTypeDiseases', ['as' => 'getTypeDiseases', 'uses' => 'TypeDiseaseController@getTypeDiseases']);
	Route::resource('type-diseases', 'TypeDiseaseController');

	// Type-Exams
	Route::get('getTypeExams', ['as' => 'getTypeExams', 'uses' => 'TypeExamController@getTypeExams']);
	Route::resource('type-exams', 'TypeExamController');

	// Type-Institutions
	Route::get('getTypeInstitutions', ['as' => 'getTypeInstitutions', 'uses' => 'TypeInstitutionController@getTypeInstitutions']);
	Route::resource('type-institutions', 'TypeInstitutionController');

	// Type-Professional-Licenses
	Route::get('getTypeProfessionalLicenses', ['as' => 'getTypeProfessionalLicenses', 'uses' => 'TypeProfessionalLicenseController@getTypeProfessionalLicenses']);
	Route::resource('type-professional-licenses', 'TypeProfessionalLicenseController');

	// Type-Specialities
	Route::get('getTypeSpecialities', ['as' => 'getTypeSpecialities', 'uses' => 'TypeSpecialityController@getTypeSpecialities']);
	Route::resource('type-specialities', 'TypeSpecialityController');

	// Type-Vehicles
	Route::get('getTypeVehicles', ['as' => 'getTypeVehicles', 'uses' => 'TypeVehicleController@getTypeVehicles']);
	Route::resource('type-vehicles', 'TypeVehicleController');

});