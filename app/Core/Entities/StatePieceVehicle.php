<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class StatePieceVehicle extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'name'
	];
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst($value);
	}
}
