<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PeriodEveryEightHour extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'begin', 'end'
	];

	/**
	 * @var bool
	 */
	public $timestamps = false;
}
