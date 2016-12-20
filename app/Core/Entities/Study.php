<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Study extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'degree_id', 'date_obtention'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'date_obtention', 'deleted_at'
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
	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailCollegeStudy()
	{
		return $this->hasOne(DetailCollegeStudy::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailSchoolStudy()
	{
		return $this->hasOne(DetailSchoolStudy::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailTechnicalStudy()
	{
		return $this->hasOne(DetailTechnicalStudy::class);
	}
	
	/**
	 * @return string 'type_degree_id'
	 */
	public function getTypeDegreeIdAttribute()
	{
		switch ( $this->degree_id )
		{
			case 1:
			case 2:
				$type = 'school';
				break;
			case 3:
				$type = 'technical';
				break;
			default:
				$type = 'college';
				break;
		}
		
		return $type;
	}
	
	/**
	 * @param string $value (01-01-2010)
	 */
	public function setDateObtentionAttribute($value)
	{
		$this->attributes['date_obtention'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
}
