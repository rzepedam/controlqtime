<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LegalRepresentative extends Model
{

	/*
     * Properties
     */

	protected $fillable = [
		'company_id', 'male_surname', 'female_surname', 'first_name', 'second_name', 'rut', 'birthday', 'nationality_id', 'email', 'phone1', 'phone2'
	];


	/*
     * Relationships
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

	public function company() {
		return $this->belongsTo('App\Company');
	}


	/*
     * Set methods (Mutators)
     */


    /**
     * @param string $value
     */
	public function setMaleSurnameAttribute($value) {
		$this->attributes['male_surname'] = ucfirst($value);
	}


    /**
     * @param string $value
     */
	public function setFemaleSurnameAttribute($value) {
		$this->attributes['female_surname'] = ucfirst($value);
	}


    /**
     * @param string $value
     */
	public function setFirstNameAttribute($value) {
		$this->attributes['first_name'] = ucfirst($value);
	}


    /**
     * @param string $value
     */
	public function setSecondNameAttribute($value) {
		$this->attributes['second_name'] = ucfirst($value);
	}


    /**
     * @param string $value
     */
	public function setEmailAttribute($value) {
		$this->attributes['email'] = strtolower($value);
	}
}
