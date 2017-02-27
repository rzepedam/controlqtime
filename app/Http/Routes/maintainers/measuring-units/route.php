<?php

// Measuring-Units
Route::get('measuring-units', ['as' => 'maintainers.measuring-units', function () {
    return view('maintainers.measuring-units.index');
}]);

Route::group(['prefix' => 'measuring-units'], function () {

    // Weight
    Route::get('getWeights', ['as' => 'maintainers.measuring-units.getWeights', 'uses' => 'WeightController@getWeights']);
    Route::resource('weights', 'WeightController');

    // Engine-Cubic
    Route::get('getEngineCubics', ['as' => 'maintainers.measuring-units.getEngineCubics', 'uses' => 'EngineCubicController@getEngineCubics']);
    Route::resource('engine-cubics', 'EngineCubicController');
});
