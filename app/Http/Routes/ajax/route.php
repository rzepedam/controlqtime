<?php

Route::post('loadProvinces', 'AjaxLoadController@loadProvinces');
Route::post('loadCommunes', 'AjaxLoadController@loadCommunes');
Route::post('verificaEmail', 'AjaxLoadController@verificaEmail');
Route::post('loadModelVehicles', 'AjaxLoadController@loadModelVehicles');
Route::post('operations/check-vehicle-forms/loadDetailVehicle', 'AjaxLoadController@loadDetailVehicle');