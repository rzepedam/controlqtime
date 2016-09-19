<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Institution extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'type_institution_id'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function typeInstitution()
	{
		return $this->belongsTo(TypeInstitution::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst($value);
	}
	
}
