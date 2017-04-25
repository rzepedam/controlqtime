<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class FormVisit extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
    	'address', 'city', 'phone'
	];

	/**
	 * @var bool
	 */
	public $timestamps = false;
}
