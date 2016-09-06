<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeCompany extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public $timestamps = false;

	/**
	 * @param string $value
	 */
	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
}
