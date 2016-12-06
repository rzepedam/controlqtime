<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Jenssegers\Date\Date;

class Terminal extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'address', 'commune_id'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function commune()
	{
		return $this->belongsTo(Commune::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param string $value
	 */
	public function setAddressAttribute($value)
	{
		$this->attributes['address'] = ucfirst($value);
	}
	
	
	/**
	 * @return string (Martes 6 Diciembre 2016 08:50:00)
	 */
	public function getFormattedCreatedAtAttribute()
	{
		return Date::parse($this->created_at)->format('l j F Y H:i:s');
	}
}
