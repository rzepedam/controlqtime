<?php

// SidebarMenu
Route::get('measuring-units', 'SidebarMenuController@getMeasuringUnits')->name('maintainers.measuring-units');

// Measuring-Units
Route::group(['prefix' => 'measuring-units'], function () {
    // Weight
    Route::get('getWeights', ['as' => 'maintainers.measuring-units.getWeights', 'uses' => 'WeightController@getWeights']);
    Route::resource('weights', 'WeightController');

    // Engine-Cubic
    Route::get('getEngineCubics', ['as' => 'maintainers.measuring-units.getEngineCubics', 'uses' => 'EngineCubicController@getEngineCubics']);
    Route::resource('engine-cubics', 'EngineCubicController');
});
