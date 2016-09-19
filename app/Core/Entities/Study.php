<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Study extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'degree_id', 'name_study', 'institution_study_id', 'date_obtention'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'date_obtention'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function degree()
	{
		return $this->belongsTo(Degree::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function institution()
	{
		return $this->belongsTo(Institution::class, 'institution_study_id');
	}
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setDateObtentionAttribute($value)
	{
		$this->attributes['date_obtention'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameStudyAttribute($value)
	{
		$this->attributes['name_study'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
}
