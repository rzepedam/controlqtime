<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyResponsability extends Eloquent
{
    protected $fillable = [
        'name_responsability', 'rut_responsability', 'relationship_id'
    ];

    /*
     * Relationships
     */
    
    public function imageFamilyResponsabilityEmployees() {
        return $this->hasMany(ImageFamilyResponsabilityEmployee::class);
    }
    
    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function relationship() {
        return $this->belongsTo(Relationship::class);
    }
}
