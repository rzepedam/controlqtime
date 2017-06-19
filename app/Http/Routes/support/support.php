<?php

// SidebarMenu
Route::get('support', 'SidebarMenuController@getSupport')->name('support');

// Support
Route::group(['prefix' => 'support'], function () {
    // Passport
    Route::get('passport', 'SidebarMenuController@getPassport');
});
