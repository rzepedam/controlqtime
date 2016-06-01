<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class RepresentativeCompany extends Eloquent
{
	protected $fillable = [
		'type_representative_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'rut_representative',
		'birthday', 'nationality_id', 'email_representative', 'phone1_representative', 'phone2_representative'
	];

	protected $dates = [
		'birthday'
	];

	/*
	 * Relationships
	 */

	public function company() {
		return $this->belongsTo(Company::class);
	}

	public function nationality() {
		return  $this->belongsTo(Nationality::class);
	}

	public function typeRepresentative() {
		return $this->belongsTo(TypeRepresentative::class);
	}

    /*
     * Mutators
     */

	public function setMaleSurnameAttribute($value) {
		$this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setFemaleSurnameAttribute($value) {
		$this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setSecondNameAttribute($value) {
		$this->attributes['second_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	public function setEmailAttribute($value) {
		$this->attributes['email_representative'] = strtolower($value);
	}

	public function setBirthdayAttribute($value) {
		$this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
	}

    /*
     * Accesors
     */

	public function getFullNameAttribute() {
		return $this->first_name . " " . $this->second_name . " " . $this->male_surname . " " . $this->female_surname;
	}
}
