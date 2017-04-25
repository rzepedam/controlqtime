<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Image extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'imageable_id', 'imageable_type', 'path', 'orig_name', 'size',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function imageable()
    {
        return $this->morphTo();
    }
}
