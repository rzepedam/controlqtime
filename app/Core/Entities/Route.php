<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Route extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'terminal_id'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function terminal()
	{
		return $this->belongsTo(Terminal::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value)
	{
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
}