<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class LegalRepresentative extends Eloquent
{
	protected $fillable = [
		'male_surname', 'female_surname', 'first_name', 'second_name', 'rut_legal',
		'birthday', 'nationality_id', 'email_legal', 'phone1_legal', 'phone2_legal'
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
		$this->attributes['email'] = strtolower($value);
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
