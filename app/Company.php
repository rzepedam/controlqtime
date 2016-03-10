<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'id', 'rut', 'firm_name', 'gyre', 'start_act', 'address', 'commune_id', 'num', 'lot', 'ofi', 'floor', 'muni_license', 'email', 'phone1', 'phone2'
    ];

    public $timestamps   = false;

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
        return $this->hasMany('App\LegalRepresentative');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageRutCompanies() {
        return $this->hasMany('App\ImageRutCompany');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageLicenseCompanies() {
        return $this->hasMany('App\ImageLicenseCompany');
    }

    /**
     * @param string $value
     */
    public function setStartActAttribute($value) {
        $this->attributes['start_act'] = strtotime($value);
    }


    /**
     * @param string $value
     */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

}