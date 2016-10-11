<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_company_id', 'rut', 'firm_name', 'gyre', 'start_act', 'muni_license', 'email_company'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_act'
    ];
	
	
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
    public function imageRolCompanies()
    {
        return $this->hasMany(ImageRolCompany::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagePatentCompanies()
    {
        return $this->hasMany(ImagePatentCompany::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeCompany()
    {
        return $this->belongsTo(TypeCompany::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune()
    {
        return $this->belongsTo(Commune::class);
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

}