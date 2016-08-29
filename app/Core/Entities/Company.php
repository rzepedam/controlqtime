<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Controlqtime\Helpers\Helper;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    protected $fillable = [
        'type_company_id', 'rut', 'firm_name', 'gyre', 'start_act', 'address', 'commune_id', 'lot',
        'bod', 'ofi', 'floor', 'muni_license', 'email_company', 'phone1', 'phone2', 'status'
    ];

    protected $dates = [
        'start_act'
    ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function legalRepresentative() {
        return $this->hasOne(LegalRepresentative::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imageRolCompanies() {
        return $this->hasMany(ImageRolCompany::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function imagePatentCompanies() {
        return $this->hasMany(ImagePatentCompany::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function typeCompany() {
        return $this->belongsTo(TypeCompany::class);
    }

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function commune() {
        return $this->belongsTo(Commune::class);
    }


	/**
	 * @param string $value format 123.456.789-k
	 */
	public function setRutAttribute($value) {
		$this->attributes['rut'] = str_replace('.', '', $value);
	}

	/**
	 * @param $value
	 */
	public function setFirmNameAttribute($value) {
        $this->attributes['firm_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

	/**
	 * @param $value
	 */
	public function setGyreAttribute($value) {
        $this->attributes['gyre'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

	/**
	 * @param $value
	 */
	public function setEmailCompanyAttribute($value) {
        $this->attributes['email_company'] = strtolower($value);
    }

	/**
	 * @param $value
	 */
	public function setStartActAttribute($value) {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }


	/**
	 * @param string $value format 123456789-k
	 * @return string 123.456.789-k
	 */
	public function getRutAttribute($value) {
		return Helper::formatedRut($value);
	}
}