<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageCertificationEmployee extends Eloquent
{
	protected $fillable = [
		'certification_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function certification() {
		$this->belongsTo(Certification::class);
	}
}
