<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disability extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_disability_id', 'treatment_disability', 'detail_disability'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageDisabilityEmployees()
	{
		return $this->hasMany(ImageDisabilityEmployee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function typeDisability()
	{
		return $this->belongsTo(TypeDisability::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setDetailDisabilityAttribute($value)
	{
		$this->attributes['detail_disability'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
}
