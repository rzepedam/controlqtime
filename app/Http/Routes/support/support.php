<?php

Route::group(['prefix' => 'support'], function () {
    // Passport
    Route::get('passport', function () {
        return view('support.passport');
    });
});
