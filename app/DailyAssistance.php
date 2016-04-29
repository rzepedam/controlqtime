<?php

namespace Controlqtime;

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
        return $this->belongsTo('Controlqtime\Manpower');
    }
}
