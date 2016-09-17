<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Trademark extends Eloquent
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
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function modelVehicles()
	{
		return $this->hasMany(ModelVehicle::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
}
