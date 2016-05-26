<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImagePatentCompany extends Eloquent
{
    protected $fillable = [
        'path', 'orig_name', 'size'
    ];

    /*
     * Relationships
     */

    public function company() {
        $this->belongsTo(Company::class);
    }
}
