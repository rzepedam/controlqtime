<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageSpecialityEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'speciality_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
