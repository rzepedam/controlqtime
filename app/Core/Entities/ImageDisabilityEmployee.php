<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageDisabilityEmployee extends Eloquent
{
	protected $fillable = [
		'disability_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */
	
	public function disability() {
		return $this->belongsTo(Disability::class);
	}
	
}
