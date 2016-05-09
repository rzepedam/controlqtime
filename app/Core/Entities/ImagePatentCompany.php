<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImagePatentCompany extends Eloquent
{
    protected $fillable = [
        'name', 'mime', 'orig_name'
    ];

    /*
     * Relationships
     */

    public function company() {
        $this->belongsTo(Company::class);
    }
}
