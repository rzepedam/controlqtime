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

	/*
	 * Mutators
	 */

	public function setNameContactAttribute($value) {
		$this->attributes['name_contact'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setEmailContactAttribute($value) {
		$this->attributes['email_contact'] = strtolower($value);
	}

	public function setAddressContactAttribute($value) {
		$this->attributes['address_contact'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
}
