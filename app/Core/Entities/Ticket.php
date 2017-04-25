<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Ticket extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'company', 'rut', 'email'
	];

}
