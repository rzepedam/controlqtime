<?php

// Visible
Route::resource('form-visits', 'FormVisitController');
Route::group(['prefix' => 'form-visits'], function () {
    Route::post('addImages', ['as' => 'VisitAddImages', 'uses' => 'FormVisitController@addImages']);
    Route::post('deleteImages', ['as' => 'VisitDeleteImages', 'uses' => 'FormVisitController@deleteImages']);
});

// Protected
Route::group(['middleware' => 'auth'], function () {
    require base_path().'/app/Http/Routes/home/admin.php';

    require base_path().'/app/Http/Routes/notifications/admin.php';

    require base_path().'/app/Http/Routes/administration/admin.php';

    require base_path().'/app/Http/Routes/human-resources/admin.php';

    require base_path().'/app/Http/Routes/operations/admin.php';

    require base_path().'/app/Http/Routes/sign-in-visits/admin.php';

    require base_path().'/app/Http/Routes/maintainers/admin.php';

    require base_path().'/app/Http/Routes/graphics/admin.php';

    require base_path().'/app/Http/Routes/ajax/route.php';

    require base_path().'/app/Http/Routes/download/route.php';

    require base_path().'/app/Http/Routes/support/support.php';

    require base_path().'/app/Http/Routes/tickets/admin.php';
});
