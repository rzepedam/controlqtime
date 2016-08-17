<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class NumHour extends Eloquent
{
	protected $fillable = array(
		'name'
	);

    public $timestamps = false;

	/*
	 * Mutators
	 */

	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

}
