<?php

namespace Controlqtime\Notifications\Assistance;

use Illuminate\Bus\Queueable;
use Controlqtime\Core\Entities\Employee;
use Illuminate\Notifications\Notification;
use Controlqtime\Events\AccessNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Contracts\Notifications\Dispatcher;
use Illuminate\Notifications\Messages\MailMessage;

class Access extends Notification implements ShouldQueue
{
	use Queueable;

	protected $employee;

	protected $assistance;

	/**
	 * Handle the event here
	 *
	 * @param AccessNotification $event
	 */
	public function handle(AccessNotification $event)
	{
		$this->assistance = $event->assistance;
		$rut              = str_replace('.', '', $this->assistance->rut);
		$this->employee   = Employee::where('rut', $rut)->firstOrFail();

		app(Dispatcher::class)
			->sendNow($this->employee->user, $this);
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return array
	 */
	public function via($notifiable)
	{
		return [ 'mail' ];
	}

	/**
	 * Get the mail representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		return (new MailMessage)
			->subject('Asistencia Diaria')
			->markdown('emails.assistances.access', [
				'assistance' => $this->assistance,
				'employee'   => $this->employee,
			]);
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return array
	 */
	public function toArray($notifiable)
	{
		return [
			//
		];
	}
}
