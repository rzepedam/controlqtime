<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelVehicle extends Model
{
    protected $fillable = [
        'name', 'trademark_id'
    ];

    public $timestamps = false;

    public function scopeName($query, $name)
    {
        $not_space_name = trim($name);

        if(!empty(trim($not_space_name))) {
            $query->where("name", "LIKE", "%$not_space_name%");
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trademark() {
        return $this->belongsTo('App\Trademark');
    }

    /*
     * Mutators
     */

    
    /**
     * @param string $value
     */
    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}
