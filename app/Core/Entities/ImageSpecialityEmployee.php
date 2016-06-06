<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageSpecialityEmployee extends Eloquent
{
	protected $fillable = [
		'speciality_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function speciality() {
		$this->belongsTo(Speciality::class);
	}
}
