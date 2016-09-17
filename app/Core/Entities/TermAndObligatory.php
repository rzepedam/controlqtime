<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TermAndObligatory extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'default'
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
	public function setDefaultAttribute($value)
	{
		if ($value == 'on')
			$this->attributes['default'] = true;
		else
			$this->attributes['default'] = false;
	}
	
	/**
	 * @param boolean $value
	 *
	 * @return string
	 */
	public function getDefaultAttribute($value)
	{
		if ($value)
			return 'checked';
	}
}
