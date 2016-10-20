<?php

namespace Controlqtime\Notifications;

use Illuminate\Bus\Queueable;
use Controlqtime\Core\Entities\User;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmployeeWasRegistered extends Notification
{
    use Queueable;
	
	/**
	 * @var Employee
	 */
	public $user;
	
	/**
	 * Create a new notification instance.
	 *
	 * @param User $user
	 */
    public function __construct(User $user)
    {
	    $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'slack'];
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
                    ->subject('Nuevo registro de usuario')
			        ->greeting('Buenos días!')
			        ->line('El Trabajador ' . $this->user->employee->full_name . ' fue registrado exitosamente. Le recordamos que debe adjuntar la documentación necesaria y el Contrato Laboral para que éste sea activado.')
			        ->line('Es posible que reciba notificaciones si tarda en realizar este proceso.')
			        ->action('Activar Trabajador', 'http://controlqtime.cl/login')
			        ->line('Gracias por utilizar nuestra aplicación!');
    }
	
	public function toSlack($notifiable)
	{
		return (new SlackMessage)
			->success()
			->content('One of your invoices has been paid!');
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
