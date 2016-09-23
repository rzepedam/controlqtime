<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageFamilyResponsabilityEmployee extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'family_responsability_id', 'path', 'orig_name', 'size'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function familyResponsability()
    {
        return $this->belongsTo(FamilyResponsability::class);
    }

}
