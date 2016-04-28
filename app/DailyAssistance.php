<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyAssistance extends Model
{
    protected $fillable = [
        'manpower_id'
    ];
    
    /*
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manpower() {
        return $this->belongsTo('App\Manpower');
    }
}
