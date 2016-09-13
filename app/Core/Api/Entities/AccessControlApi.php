<?php

namespace Controlqtime\Core\Api\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AccessControlApi extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
    	'rut', 'num_device', 'status', 'created_at'
	];

	/**
	 * @var bool
	 */
	public $timestamps = false;
}
