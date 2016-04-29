<?php

namespace Controlqtime;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id', 'rut', 'firm_name', 'gyre', 'start_act', 'address', 'commune_id', 'num', 'lot', 'ofi', 'floor', 'muni_license', 'email', 'phone1', 'phone2'
    ];

    protected $dates = [
        'start_act'
    ];


    public function scopeFirmName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty($not_space_name)) {
            $query->where("firm_name", "LIKE", "%$not_space_name%");
        }
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function legalRepresentatives() {
        return $this->hasMany('Controlqtime\LegalRepresentative');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subsidiaries() {
        return $this->hasMany('Controlqtime\Subsidiary');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageRutCompanies() {
        return $this->hasMany('Controlqtime\ImageRutCompany');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageLicenseCompanies() {
        return $this->hasMany('Controlqtime\ImageLicenseCompany');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function manpowers() {
        return $this->hasMany('Controlqtime\Manpower');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune() {
        return $this->belongsTo('Controlqtime\Commune');
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
    public function setStartActAttribute($value) {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }


    /**
     * @return int
     */
    public function getNumSubsidiaryAttribute() {
        return count($this->subsidiaries);
    }


    /**
     * @return int
     */
    public function getNumRepresentativeAttribute() {
        return count($this->legalRepresentatives);
    }
}