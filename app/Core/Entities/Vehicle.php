<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    protected $fillable = [
        'model_vehicle_id', 'type_vehicle_id', 'company_id', 'state_vehicle_id', 'acquisition_date',
        'inscription_date', 'color', 'year', 'patent', 'fuel_id', 'num_motor', 'num_chasis', 'km',
        'engine_cubic', 'weight', 'code', 'obs',
    ];

    protected $dates= [
        'acquisition_date', 'inscription_date'
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

    public function stateVehicle() {
        return $this->belongsTo(StateVehicle::class);
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

    public function setColorAttribute($value) {
        $this->attributes['color'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    public function setPatentAttribute($value) {
        $this->attributes['patent'] = strtoupper($value);
    }

    public function setNumChasisAttribute($value) {
        $this->attributes['num_chasis'] = strtoupper($value);
    }

    public function setNumMotorAttribute($value) {
        $this->attributes['num_motor'] = strtoupper($value);
    }

    public function setAcquisitionDateAttribute($value) {
        $this->attributes['acquisition_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setInscriptionDateAttribute($value) {
        $this->attributes['inscription_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /*
     * Accesors
     */

    public function getAcquisitionDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getInscriptionDateAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

}
