<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class InfoContact extends Eloquent
{
    protected $fillable = [
		'name_contact', 'email_contact', 'address_contact', 'tel_contact'
	];

	/*
	 * Relationships
	 */

	public function employee() {
		return $this->belongsTo(Employee::class);
	}
}
