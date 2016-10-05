<?php

namespace Controlqtime\Core\Api\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DailyAssistanceApi extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'rut', 'num_device', 'status', 'created_at'
	];
}
