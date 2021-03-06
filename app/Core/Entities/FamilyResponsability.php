<?php

namespace Controlqtime\Core\Entities;

use Controlqtime\Core\Helpers\FormatField;
use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyResponsability extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'name_responsability', 'rut_responsability', 'relationship_id',
    ];

    /**
     * @var array
     */
    protected $dates = [
        'emission_exam', 'expired_exam', 'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function imageable()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    /**
     * @param string $value
     */
    public function setNameResponsabilityAttribute($value)
    {
        $this->attributes['name_responsability'] = ucwords(mb_strtolower($value, 'UTF-8'));
    }

    /**
     * @param string $value format 12.345.678-9
     */
    public function setRutResponsabilityAttribute($value)
    {
        $this->attributes['rut_responsability'] = str_replace('.', '', $value);
    }

    /**
     * @param string $value format 12345678-9
     *
     * @return string 12.345.678-9
     */
    public function getRutResponsabilityAttribute($value)
    {
        return FormatField::rut($value);
    }
}
