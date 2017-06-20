<?php

Route::group(['prefix' => 'notifications'], function () {
    Route::get('mark-all-read', 'NotificationController@markAsRead');
    Route::get('notifications/{notification}', 'NotificationController@linkToUserNotificationCreator');
});
