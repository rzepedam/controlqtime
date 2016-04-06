<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'degree_id', 'name_study', 'institution_study_id', 'date'
    ];

    



}
