<?php

Route::get('loadProvinces', 'AjaxLoadController@loadProvinces');
Route::get('loadCommunes', 'AjaxLoadController@loadCommunes');
Route::get('verificaEmail', 'AjaxLoadController@verificaEmail');
Route::post('loadModelVehicles', 'AjaxLoadController@loadModelVehicles');
Route::post('operations/check-vehicle-forms/loadDetailVehicle', 'AjaxLoadController@loadDetailVehicle');
