<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TermAndObligatory extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'act'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function contracts()
	{
		return $this->belongsToMany(Contract::class);
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
	public function setActAttribute($value)
	{
		$this->attributes['act'] = ($value === 'on') ? true : false;
	}
	
	/**
	 * @param boolean $value
	 *
	 * @return string
	 */
	public function getActAttribute($value)
	{
		return ($value) ? 'checked' : null;
	}
}
