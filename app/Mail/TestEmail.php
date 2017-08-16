<?php

namespace Controlqtime\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestEmail extends Mailable
{
	use Queueable, SerializesModels;

	public $assistances;

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
		return $this->markdown('emails.assistances.weekly-assistance');
	}
}
