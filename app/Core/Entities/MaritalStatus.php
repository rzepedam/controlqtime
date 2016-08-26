<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MaritalStatus extends Eloquent
{
    protected $fillable = array(
    	'name'
	);

	public $timestamps = false;

	/**
	 * @param string $value
	 */
	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
}
