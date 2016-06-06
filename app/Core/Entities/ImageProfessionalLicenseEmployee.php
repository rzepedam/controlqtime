<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageProfessionalLicenseEmployee extends Eloquent
{
	protected $fillable = [
		'professional_license_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function professionalLicense () {
		return $this->belongsTo(ProfessionalLicense::class);
	}
}
