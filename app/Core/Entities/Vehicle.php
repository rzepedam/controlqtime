<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    protected $fillable = [
        'model_vehicle_id', 'type_vehicle_id', 'company_id', 'year', 'color', 'patent',
        'fuel_id', 'num_motor', 'num_chasis', 'km', 'engine_cubic', 'weight', 'code', 'obs',
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

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function imagePadrones() {
        return $this->hasMany(ImagePadronVehicle::class);
    }

    public function imageObligatoryInsurances() {
        return $this->hasMany(ImageObligatoryInsuranceVehicle::class);
    }

    public function imagePatents() {
        return $this->hasMany(ImagePatentVehicle::class);
    }
    
    public function imageCirculationPermits() {
        return $this->hasMany(ImageCirculationPermitVehicle::class);
    }
    
    /*
     * Mutators
     */

    public function setPatentAttribute($value) {
        $this->attributes['patent'] = strtoupper($value);
    }

}
