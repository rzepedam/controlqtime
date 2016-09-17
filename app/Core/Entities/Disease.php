<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disease extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_disease_id', 'treatment_disease', 'detail_disease'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imageDiseaseEmployees()
    {
        return $this->hasMany(ImageDiseaseEmployee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDisease()
    {
        return $this->belongsTo(TypeDisease::class);
    }

}
