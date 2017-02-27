<?php

use Illuminate\Notifications\DatabaseNotification;

Route::group(['prefix' => 'notifications'], function () {
    Route::get('mark-all-read', function () {
        auth()->user()->notifications->markAsRead();

        return back();
    });
});

Route::get('notifications/{notification}', function (DatabaseNotification $notification) {
    $notification->markAsRead();

    switch ($notification->notifiable_type) {
        case 'Controlqtime\Core\Entities\User':
            return redirect()->route('employees.show', $notification->notifiable_id);

    }
});
