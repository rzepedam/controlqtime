<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationController extends Controller
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function markAsRead()
    {
        auth()->user()->notifications->markAsRead();

        return back();
    }

    /**
     * @param DatabaseNotification $notification
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function linkToUserNotificationCreator(DatabaseNotification $notification)
    {
        $notification->markAsRead();

        switch ($notification->notifiable_type) {
            case 'Controlqtime\Core\Entities\User':
                return redirect()->route('employees.show', $notification->notifiable_id);

        }
    }
}
