<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Subsidiary extends Eloquent
{
    protected $fillable = [
        'address_suc', 'commune_suc_id', 'num_suc', 'lot_suc', 'ofi_suc', 'floor_suc', 'muni_license_suc',
        'phone1_suc', 'phone2_suc', 'email_suc'
    ];

    /*
     * Relationships
     */

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function commune() {
        return $this->belongsTo(Commune::class, 'commune_suc_id');
    }

    /*
     * Mutators
     */

    public function setEmailAttribute($value) {
        $this->attributes['email_suc'] = strtolower($value);
    }
}
