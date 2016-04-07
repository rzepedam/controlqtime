<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyResponsability extends Model
{
    protected $fillable = [
        'name_responsability', 'rut', 'relationship_id'
    ];
}
