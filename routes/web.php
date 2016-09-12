<?php

Auth::routes();

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

require base_path() . '/app/Http/Routes/home/admin.php';

require base_path() . '/app/Http/Routes/administration/admin.php';

require base_path() . '/app/Http/Routes/human-resources/admin.php';

require base_path() . '/app/Http/Routes/operations/admin.php';

require base_path() . '/app/Http/Routes/maintainers/admin.php';

require base_path() . '/app/Http/Routes/ajax/route.php';

require base_path() . '/app/Http/Routes/download/route.php';

Auth::routes();

Route::get('/home', 'HomeController@index');
