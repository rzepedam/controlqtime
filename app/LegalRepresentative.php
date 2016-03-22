<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LegalRepresentative extends Model
{

	protected $fillable = [
		'company_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'rut', 'birthday', 'nationality_id', 'email', 'phone1', 'phone2'
	];

	protected $dates = [
		'birthday'
	];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
	public function company() {
		return $this->belongsTo('App\Company');
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function nationality() {
		return  $this->belongsTo('App\Nationality');
	}


    /**
     * @param string $value
     */
	public function setMaleSurnameAttribute($value) {
		$this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}


    /**
     * @param string $value
     */
	public function setFemaleSurnameAttribute($value) {
		$this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}


    /**
     * @param string $value
     */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}


    /**
     * @param string $value
     */
	public function setSecondNameAttribute($value) {
		$this->attributes['second_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}


    /**
     * @param string $value
     */
	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}


	/**
	 * @param string $value
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
