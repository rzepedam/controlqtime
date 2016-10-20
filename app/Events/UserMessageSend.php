<?php

namespace Controlqtime\Events;

use Controlqtime\Core\Entities\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class UserMessageSend
{
    use InteractsWithSockets, SerializesModels;
	
	/**
	 * @var User
	 */
	public $user;
	
	/**
	 * Create a new event instance.
	 *
	 * @param User $user
	 */
    public function __construct(User $user)
    {
	    $this->user = $user;
    }
    
}
