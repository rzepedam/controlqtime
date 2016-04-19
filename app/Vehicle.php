<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'type_vehicle_id', 'model_vehicle_id', 'terminal_id', 'operator_id', 'patent',
        'year', 'code'
    ];
    
    public function scopePatent($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("patent", "LIKE", "%$not_space_name%");
        }
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function modelVehicle() {
        return $this->belongsTo('App\ModelVehicle');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeVehicle() {
        return $this->belongsTo('App\TypeVehicle');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terminal() {
        return $this->belongsTo('App\Terminal');
    }

    /*
     * Mutators
     */

    /**
     * @param string $value
     */
    public function setPatentAttribute($value) {
        $this->attributes['patent'] = strtoupper($value);
    }
}
