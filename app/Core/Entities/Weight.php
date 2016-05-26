<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Weight extends Eloquent
{
    protected $fillable = [
		'name', 'acr'
	];

	public $timestamps = false;
	
	/*
	 * Mutators
	 */

	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setAcrAttribute($value) {
		$this->attributes['acr'] = strtolower($value);
	}

}
