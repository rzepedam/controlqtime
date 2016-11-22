<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
	use SoftDeletes, CascadeSoftDeletes;
	
    /**
     * @var array
     */
    protected $fillable = [
        'type_company_id', 'rut', 'firm_name', 'gyre', 'start_act', 'muni_license', 'email_company'
    ];
	
	/**
	 * @var array
	 */
	protected $cascadeDeletes = [
		'legalRepresentative', 'address', 'vehicles', 'imagesable'
	];

    /**
     * @var array
     */
    protected $dates = [
        'start_act', 'deleted_at'
    ];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphOne
	 */
	public function imagesable()
	{
		return $this->morphMany(Image::class, 'imagesable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphOne
	 */
	public function address()
	{
        return $this->morphOne(Address::class, 'addressable');
	}
	
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legalRepresentative()
    {
        return $this->hasOne(LegalRepresentative::class);
    }
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCompany()
    {
        return $this->belongsTo(TypeCompany::class);
    }

    /**
     * @param string $value format 123.456.789-k
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }

    /**
     * @param string $value
     */
    public function setFirmNameAttribute($value)
    {
        $this->attributes['firm_name'] = ucfirst($value);
    }

    /**
     * @param string $value
     */
    public function setGyreAttribute($value)
    {
        $this->attributes['gyre'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setEmailCompanyAttribute($value)
    {
        $this->attributes['email_company'] = strtolower($value);
    }

    /**
     * @param string $value
     */
    public function setStartActAttribute($value)
    {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    
    /**
     * @param string $value format 123456789-k
     *
     * @return string 123.456.789-k
     */
    public function getRutAttribute($value)
    {
        return FormatField::rut($value);
    }
	
	/**
	 * @return all images related with Rol
	 */
	public function getImagesRolAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Rol%')->get();
	}
	
	/**
	 * @return all images related with Patent
	 */
	public function getImagesPatentAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Patent%')->get();
	}
	
	/**
	 * @return all images related with Carnet Legal Representative
	 */
	public function getImagesCarnetAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Carnet%')->get();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesRolAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Rol%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesPatentAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Patent%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumImagesCarnetAttribute()
	{
		return $this->imagesable()->where('path', 'like', '%Carnet%')->count();
	}
	
	/**
	 * @return int
	 */
	public function getNumTotalImagesAttribute()
	{
		return $this->getNumImagesRolAttribute() + $this->getNumImagesPatentAttribute() + $this->getNumImagesCarnetAttribute();
	}
}