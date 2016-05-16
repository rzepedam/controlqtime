<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;

class DailyAssistance extends Model
{
    protected $fillable = [
        'employee_id'
    ];
    
    /*
     * Relationships
     */

    public function employee() {
        return $this->belongsTo('Controlqtime\Employee');
    }
}
