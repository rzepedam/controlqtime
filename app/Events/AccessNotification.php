<?php

namespace Controlqtime\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class AccessNotification
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	/**
	 * @var DailyAssistanceApi
	 */
	public $assistance;

	/**
	 * Create a new event instance.
	 *
	 * @param DailyAssistanceApi $assistance
	 */
	public function __construct(DailyAssistanceApi $assistance)
	{
		$this->assistance = $assistance;
	}

}
