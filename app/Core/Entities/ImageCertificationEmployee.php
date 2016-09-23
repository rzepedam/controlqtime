<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageCertificationEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'certification_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }
}
