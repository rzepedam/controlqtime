<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalRepresentative extends Model
{
	protected $fillable = [
		'company_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'rut', 'birthday', 'nationality_id', 'email', 'phone1', 'phone2'
	];

	public function company() {
		return $this->belongsTo('App\Company');
	}

	public function setMaleSurnameAttribute($value) {
		$this->attributes['male_surname'] = ucfirst($value);
	}

	public function setFemaleSurnameAttribute($value) {
		$this->attributes['female_surname'] = ucfirst($value);
	}

	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucfirst($value);
	}

	public function setSecondNameAttribute($value) {
		$this->attributes['second_name'] = ucfirst($value);
	}

	public function setBirthdayAttribute($value) {
		$this->attributes['birthday'] = strtotime($value);
	}

	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}
}
