<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailCollegeStudy extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
        'institution_study_id', 'name_study'
	];
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function study()
	{
	    return $this->belongsTo(Study::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function institution()
	{
		return $this->belongsTo(Institution::class, 'institution_study_id');
	}
	
	
	/**
	 * @param string $value
	 */
	public function setNameStudyAttribute($value)
	{
		$this->attributes['name_study'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
}
