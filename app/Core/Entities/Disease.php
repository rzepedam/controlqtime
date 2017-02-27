<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Disease extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_disease_id', 'treatment_disease', 'detail_disease',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function imagesable()
    {
        return $this->morphMany(Image::class, 'imagesable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeDisease()
    {
        return $this->belongsTo(TypeDisease::class);
    }

    /**
     * @param string $value
     */
    public function setDetailDiseaseAttribute($value)
    {
        $this->attributes['detail_disease'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
