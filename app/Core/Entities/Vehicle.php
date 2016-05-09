<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    protected $fillable = [
        'type_vehicle_id', 'model_vehicle_id', 'terminal_id', 'company_id', 'patent',
        'year', 'code', 'status'
    ];

    /*
     * Relationships
     */

    public function typeVehicle() {
        return $this->belongsTo(TypeVehicle::class);
    }

    public function modelVehicle() {
        return $this->belongsTo(ModelVehicle::class);
    }

    public function terminal() {
        return $this->belongsTo(Terminal::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
    
    /*
     * Mutators
     */

    public function setPatentAttribute($value) {
        $this->attributes['patent'] = strtoupper($value);
    }

}
