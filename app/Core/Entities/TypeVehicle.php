<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeVehicle extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'engine_cubic_id', 'weight_id'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function engineCubic()
	{
		return $this->belongsTo(EngineCubic::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function weight()
	{
		return $this->belongsTo(Weight::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
}
