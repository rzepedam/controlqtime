<?php

use Illuminate\Support\Facades\Route;

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
    $api->group(['namespace' => 'Controlqtime\Core\Api\Http\Controllers'], function($api) {
        $api->resource('access-control', 'AccessControlController');
    });
});

Route::group(['middleware' => ['web']], function () {

    require __DIR__ . '/Routes/home/admin.php';

    require __DIR__ . '/Routes/administration/admin.php';

    require __DIR__ . '/Routes/human-resources/admin.php';

    require __DIR__ . '/Routes/operations/admin.php';

    require __DIR__ . '/Routes/maintainers/admin.php';

    require __DIR__ . '/Routes/ajax/route.php';

    require __DIR__ . '/Routes/download/route.php';

});
