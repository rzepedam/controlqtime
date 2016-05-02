<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ModelVehicle extends Eloquent
{
    protected $fillable = [
        'name', 'trademark_id'
    ];

    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trademark() {
        return $this->belongsTo(Trademark::class);
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
