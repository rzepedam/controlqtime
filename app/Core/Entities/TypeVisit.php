<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeVisit extends Eloquent
{
	/**
	 * @var array
	 */
    protected $fillable = [
    	'name'
	];

	/**
	 * @var boolean
	 */
	public $timestamps = false;
}
