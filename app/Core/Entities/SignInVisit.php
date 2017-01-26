<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;

class SignInVisit extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'male_surname', 'female_surname', 'first_name', 'second_name',
		'full_name', 'rut', 'birthday', 'is_male', 'phone', 'email'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'birthday'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function contactsable()
	{
		return $this->morphOne(ContactEmployee::class, 'contactsable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
	}
	
	
	/**
	 * @param string $value
	 */
	public function setMaleSurnameAttribute($value)
	{
		$this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param string $value
	 */
	public function setFemaleSurnameAttribute($value)
	{
		$this->attributes['female_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param string $value
	 */
	public function setFirstNameAttribute($value)
	{
		$this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param string $value
	 */
	public function setSecondNameAttribute($value)
	{
		$this->attributes['second_name'] = ucwords(mb_strtolower($value, 'utf-8'));
	}
	
	/**
	 * @param $value '15.982.092-2'
	 */
	public function setRutAttribute($value)
	{
		$this->attributes['rut'] = str_replace('.', '', $value);
	}
	
	/**
	 * @param $value '12-08-1990'
	 */
	public function setBirthdayAttribute($value)
	{
		$this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param $value 'M or F'
	 *
	 * @return bool
	 */
	public function setIsMaleAttribute($value)
	{
		if ( 'M' === $value )
		{
			return $this->attributes['is_male'] = true;
		}
		
		return $this->attributes['is_male'] = false;
	}
	
	/**
	 * @param $value '12345678-9'
	 *
	 * @return mixed '12.345.678-9'
	 */
	public function getRutAttribute($value)
	{
		return FormatField::rut($value);
	}
	
	/**
	 * @param $value '1980-12-01'
	 *
	 * @return string '01-12-1980'
	 */
	public function getBirthdayAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
	
	/**
	 * @return string 'Lunes 12 Diciembre 2016'
	 */
	public function getBirthdayToSpanishFormatAttribute()
	{
		return Date::parse($this->birthday)->format('l j F Y');
	}
	
	/**
	 * @return string
	 */
	public function getIsMaleToLongTextAttribute()
	{
		return $this->is_male ? 'Masculino' : 'Femenino';
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesVisitAttribute()
	{
		dd($this->imagesable()->count());
		return $this->imagesable()->count();
	}
}
