<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'type_vehicle_id', 'model_vehicle_id', 'company_id', 'state_vehicle_id',
		'acquisition_date', 'inscription_date', 'year', 'patent', 'code'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'acquisition_date', 'inscription_date', 'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
	
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
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
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
	 * @return mixed 'lunes 12 diciembre 2016'
	 */
	public function getAcquisitionDateToSpanishFormatAttribute()
	{
	    return Date::parse($this->acquisition_date)->format('l j F Y');
	}
	
	/**
	 * @return mixed 'lunes 12 diciembre 2016'
	 */
	public function getInscriptionDateToSpanishFormatAttribute()
	{
		return Date::parse($this->inscription_date)->format('l j F Y');
	}
	
	/**
	 * @return mixed 'lunes 12 diciembre 2016'
	 */
	public function getCreatedAtToSpanishFormatAttribute()
	{
		return Date::parse($this->created_at)->format('l j F Y H:i:s');
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
	
	/**
	 * @return all images related with Padron
	 */
	public function getImagesPadronAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Padron%')->get();
	}
	
	/**
	 * @return all images related with ObligatoryInsurance
	 */
	public function getImagesObligatoryInsuranceAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%ObligatoryInsurance%')->get();
	}
	
	/**
	 * @return all images related with CirculationPermit
	 */
	public function getImagesCirculationPermitAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%CirculationPermit%')->get();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesPadronAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Padron%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesObligatoryInsuranceAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%ObligatoryInsurance%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesCirculationPermitAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%CirculationPermit%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumTotalImagesAttribute()
	{
		return $this->getNumImagesPadronAttribute() + $this->getNumImagesObligatoryInsuranceAttribute()
		+ $this->getNumImagesCirculationPermitAttribute();
	}
	
}
