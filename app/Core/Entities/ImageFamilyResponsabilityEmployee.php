<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageFamilyResponsabilityEmployee extends Eloquent
{
	protected $fillable = [
		'family_responsability_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function familyResponsability() {
		return $this->belongsTo(FamilyResponsability::class);
	}

}
