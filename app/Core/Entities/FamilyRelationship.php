<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyRelationship extends Eloquent
{
    protected $fillable = [
        'relationship_id', 'employee_family_id'
    ];

    /*
     * Relationships
     */

    public function relationship() {
        return $this->belongsTo(Relationship::class);
    }

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function employeeFamily() {
        return $this->belongsTo(Employee::class, 'employee_family_id');
    }
    
}
