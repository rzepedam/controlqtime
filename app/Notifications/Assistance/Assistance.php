<?php

namespace Controlqtime\Notifications\Assistance;

use Illuminate\Bus\Queueable;
use Controlqtime\Core\Entities\Employee;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Jenssegers\Date\Date;

class Assistance extends Notification implements ShouldQueue
{
    use Queueable;

	public $employee;

	public $assistance;

	/**
	 * Create a new notification instance.
	 *
	 * @param Employee           $employee
	 * @param DailyAssistanceApi $assistance
	 */
    public function __construct(Employee $employee, DailyAssistanceApi $assistance)
    {
    	dd(Date::parse($assistance->created_at)->format('l j F Y'));
	    $this->assistance = $assistance;
	    $this->employee   = $employee;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
	    return (new MailMessage)
		    ->subject('Asistencia Diaria')
		    ->markdown('emails.assistances.assistance', [
			    'assistance' => $this->assistance,
			    'employee'   => $this->employee,
		    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
