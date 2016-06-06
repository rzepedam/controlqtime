<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageDiseaseEmployee extends Eloquent
{
	protected $fillable = [
		'disease_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function disease() {
		return $this->belongsTo(Disease::class);
	}

}
