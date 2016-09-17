<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageDisabilityEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'disability_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function disability()
    {
        return $this->belongsTo(Disability::class);
    }

}
