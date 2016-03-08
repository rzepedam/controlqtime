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

    public function legalRepresentatives() {
        return $this->hasMany('App\LegalRepresentative');
    }

    public function setStartActAttribute($value) {
        $this->attributes['start_act'] = strtotime($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }
}