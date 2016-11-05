<?php

namespace Controlqtime\Notifications;

use Illuminate\Bus\Queueable;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Messages\SlackAttachment;

class EmployeeWasRegistered extends Notification
{
	use Queueable;
	
	/**
	 * @var Employee
	 */
	public $employee;
	
	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
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
		return ['mail', 'nexmo', 'slack'];
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
			->subject('Nuevo registro de usuario')
			->greeting('Buenos días!')
			->line('El Trabajador ' . $this->employee->full_name . ' fue registrado exitosamente. Le recordamos que debe adjuntar la documentación necesaria y el Contrato Laboral para que éste sea activado.')
			->line('Es posible que reciba notificaciones si tarda en realizar este proceso.')
			->action('Activar Trabajador', 'http://controlqtime.cl/login')
			->line('Gracias por utilizar nuestra aplicación!');
	}
	
	/**
	 * Get the Nexmo / SMS representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return NexmoMessage
	 */
	public function toNexmo($notifiable)
	{
		return (new NexmoMessage)
			->content('El usuario ' . FormatField::removeAccents($this->employee->full_name) . ' ha actualizado su perfil en CQTime');
	}
	
	/**
	 * Get the Slack representation of the notification.
	 *
	 * @param  mixed $notifiable
	 *
	 * @return SlackMessage
	 */
	public function toSlack($notifiable)
	{
		return (new SlackMessage)
			->success()
			->content('Un usuario ha sido actualizado')
			->attachment(function (SlackAttachment $attachment)
			{
				$attachment->fields([
					'Nombre'       => FormatField::removeAccents($this->employee->full_name),
					'Nacionalidad' => $this->employee->nationality->name,
					'Teléfono'     => $this->employee->address->phone1,
					'email'        => $this->employee->email_employee
				]);
			});
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
