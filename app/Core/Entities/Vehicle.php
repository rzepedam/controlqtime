<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'model_vehicle_id', 'type_vehicle_id', 'company_id', 'state_vehicle_id', 'acquisition_date',
		'inscription_date', 'year', 'patent', 'code'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'acquisition_date', 'inscription_date'
	];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function detailVehicle()
	{
		return $this->hasOne(DetailVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function dateDocumentationVehicle()
	{
		return $this->hasOne(DateDocumentationVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function typeVehicle()
	{
		return $this->belongsTo(TypeVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function modelVehicle()
	{
		return $this->belongsTo(ModelVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function company()
	{
		return $this->belongsTo(Company::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function stateVehicle()
	{
		return $this->belongsTo(StateVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imagePadrones()
	{
		return $this->hasMany(ImagePadronVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageObligatoryInsurances()
	{
		return $this->hasMany(ImageObligatoryInsuranceVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageCirculationPermits()
	{
		return $this->hasMany(ImageCirculationPermitVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function checkVehicleForms()
	{
		return $this->hasMany(CheckVehicleForm::class);
	}
	
	
	/**
	 * @param string $value (01-10-2016)
	 */
	public function setAcquisitionDateAttribute($value)
	{
		$this->attributes['acquisition_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value (01-10-2016)
	 */
	public function setInscriptionDateAttribute($value)
	{
		$this->attributes['inscription_date'] = Carbon::createFromFormat('d-m-Y', $value);
	}
	
	/**
	 * @param string $value
	 */
	public function setPatentAttribute($value)
	{
		$this->attributes['patent'] = strtoupper($value);
	}
	
	
	/**
	 * @param date $value (2016-10-01)
	 *
	 * @return string (01-10-2016)
	 */
	public function getAcquisitionDateAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
	
	/**
	 * @param date $value (2016-10-01)
	 *
	 * @return string (01-10-2016)
	 */
	public function getInscriptionDateAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
	
}
