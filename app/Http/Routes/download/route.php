<?php

Route::post('download/file', ['as' => 'download.file', 'uses' => 'DownloadController@getFile']);
Route::get('download/pdf', ['as' => 'download.pdf', 'uses' => 'DownloadController@getPdf']);
Route::get('download/excel', ['as' => 'download.excel', 'uses' => 'DownloadController@getExcel']);