<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    protected $fillable = [
        'id', 'rut', 'firm_name', 'gyre', 'start_act', 'address', 'commune_id', 'num',
        'lot', 'ofi', 'floor', 'muni_license', 'email', 'phone1', 'phone2', 'status'
    ];

    protected $dates = [
        'start_act'
    ];

    /*
     * Relationships
     */

    public function legalRepresentatives() {
        return $this->hasMany(LegalRepresentative::class);
    }

    public function subsidiaries() {
        return $this->hasMany(Subsidiary::class);
    }

    public function imageRolCompanies() {
        return $this->hasMany(ImageRolCompany::class);
    }

    public function imagePatentCompanies() {
        return $this->hasMany(ImagePatentCompany::class);
    }

    public function manpowers() {
        return $this->hasMany('Controlqtime\Manpower');
    }

    public function commune() {
        return $this->belongsTo(Commune::class);
    }

    /*
     * Mutators
     */

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    public function setStartActAttribute($value) {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /*
     * Accesors
     */

    public function getNumSubsidiaryAttribute() {
        return count($this->subsidiaries);
    }

    public function getNumRepresentativeAttribute() {
        return count($this->legalRepresentatives);
    }
}