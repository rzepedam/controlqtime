<?php

namespace Controlqtime\Mail\Assistance;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Weekly extends Mailable
{
	use Queueable, SerializesModels;

	/**
	 * @var
	 */
	public $assistances;

	/**
	 * @var
	 */
	public $employee;

	/**
	 * @var
	 */
	public $init;

	/**
	 * @var
	 */
	public $end;

	/**
	 * Create a new message instance.
	 *
	 * @param $assistances
	 * @param $employee
	 * @param $init
	 * @param $end
	 */
	public function __construct($assistances, $employee, $init, $end)
	{
		dd('...');
		$this->assistances = $assistances;
		$this->employee    = $employee;
		$this->init        = $init;
		$this->end         = $end;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject('Asistencia Semanal Controlqtime')
					->markdown('emails.assistances.weekly-assistance');
	}
}
