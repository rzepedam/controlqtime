<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageDiseaseEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'disease_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disease()
    {
        return $this->belongsTo(Disease::class);
    }

}
