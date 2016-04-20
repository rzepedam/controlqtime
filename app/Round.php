<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = [
        'route_sheet_id', 'route_id', 'vehicle_id', 'status'
    ];
}
