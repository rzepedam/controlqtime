<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyRelationship extends Eloquent
{
    protected $fillable = [
        'relationship_id', 'manpower_family_id'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship() {
        return $this->belongsTo('Controlqtime\Relationship');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee() {
        return $this->belongsTo('Controlqtime\Employee');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeeFamily() {
        return $this->belongsTo('Controlqtime\Employee', 'employee_family_id');
    }
    
}
