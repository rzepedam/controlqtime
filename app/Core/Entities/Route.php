<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Route extends Eloquent
{
    protected $fillable = [
        'name', 'terminal_id'
    ];

    /*
     * Relationships
     */

    public function terminal() {
        return $this->belongsTo(Terminal::class);
    }

    /*
     * Mutators
     */

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}