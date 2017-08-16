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
	 * Create a new message instance.
	 */
	public function __construct($assistances, $employee)
	{
		$this->assistances = $assistances;
		$this->employee    = $employee;
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
