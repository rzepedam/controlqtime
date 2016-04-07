<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    protected $fillable = [
        'type_disability_id', 'treatment_disability', 'detail_disability'
    ];
}
