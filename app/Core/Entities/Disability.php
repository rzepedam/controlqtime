<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\DestroyImageFile;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Disability extends Eloquent
{
	use SoftDeletes, DestroyImageFile;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_disability_id', 'treatment_disability', 'detail_disability'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
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
