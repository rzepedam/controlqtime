<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /*
     * Properties
     */

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


    /*
     * Relationships
     */

    public function legalRepresentatives() {
        return $this->hasMany('App\LegalRepresentative');
    }

    public function subsidiaries() {
        return $this->hasMany('App\Subsidiary');
    }

    public function imageRutCompanies() {
        return $this->hasMany('App\ImageRutCompany');
    }

    public function imageLicenseCompanies() {
        return $this->hasMany('App\ImageLicenseCompany');
    }


    /*
     * Set methods (Mutators)
     */


    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }


    /*
     * Get methods (Accesors)
     */


    public function getNumSubsidiaryAttribute() {
        return count($this->subsidiaries);
    }

    public function getNumRepresentativeAttribute() {
        return count($this->legalRepresentatives);
    }
}