<?php

namespace Controlqtime\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Controlqtime\Core\Entities\Visit;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VisitCompleteForm extends Mailable implements ShouldQueue
{
	use Queueable, SerializesModels;

	/**
	 * @var User
	 */
	public $visit;

	/**
	 * Create a new message instance.
	 *
	 * @param Visit $visit
	 */
	public function __construct(Visit $visit)
	{
		$this->visit = $visit;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		$url = env('APP_URL');

		return $this->subject('Formulario Registro Visita Completo')
					->markdown('emails.visits.form_visit_complete', compact('visit', 'url'));
	}
}
