<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Speciality extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'type_speciality_id', 'institution_speciality_id', 'emission_speciality', 'expired_speciality'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'emission_speciality', 'expired_speciality', 'deleted_at'
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
	public function typeSpeciality()
	{
		return $this->belongsTo(TypeSpeciality::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function institution()
	{
		return $this->belongsTo(Institution::class, 'institution_speciality_id');
	}
	
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setEmissionSpecialityAttribute($value)
	{
		$this->attributes['emission_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setExpiredSpecialityAttribute($value)
	{
		$this->attributes['expired_speciality'] = Carbon::createFromFormat('d-m-Y', $value);
	}
}
