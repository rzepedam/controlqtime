<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
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

    /*
     * Relationships
     */

    public function representativeCompanies() {
        return $this->hasMany(RepresentativeCompany::class);
    }

    public function imageRolCompanies() {
        return $this->hasMany(ImageRolCompany::class);
    }

    public function imagePatentCompanies() {
        return $this->hasMany(ImagePatentCompany::class);
    }

    public function typeCompany() {
        return $this->belongsTo(TypeCompany::class);
    }

    public function commune() {
        return $this->belongsTo(Commune::class);
    }

    /*
     * Mutators
     */

    public function setFirmNameAttribute($value) {
        $this->attributes['firm_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    public function setGyreAttribute($value) {
        $this->attributes['gyre'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    public function setEmailCompanyAttribute($value) {
        $this->attributes['email_company'] = strtolower($value);
    }

    public function setStartActAttribute($value) {
        $this->attributes['start_act'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}