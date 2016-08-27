<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class LegalRepresentative extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'male_surname', 'female_surname', 'first_name', 'second_name', 'rut_representative',
		'birthday', 'nationality_id', 'phone1_representative', 'phone2_representative',
		'email_representative',
	];

	/**
	 * @var array
	 */
	protected $dates = [
		'birthday'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company() {
		return $this->belongsTo(Company::class);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function nationality() {
		return  $this->belongsTo(Nationality::class);
	}

	/**
	 * @param $value
	 */
	public function setMaleSurnameAttribute($value) {
		$this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	/**
	 * @param $value
	 */
	public function setFemaleSurnameAttribute($value) {
		$this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	/**
	 * @param $value
	 */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	/**
	 * @param $value
	 */
	public function setSecondNameAttribute($value) {
		$this->attributes['second_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}

	/**
	 * @param $value
	 */
	public function setEmailAttribute($value) {
		$this->attributes['email_representative'] = strtolower($value);
	}

	/**
	 * @param $value
	 */
	public function setBirthdayAttribute($value) {
		$this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
	}

	/**
	 * @return string
	 */
	public function getFullNameAttribute() {
		return $this->first_name . " " . $this->second_name . " " . $this->male_surname . " " . $this->female_surname;
	}
}
