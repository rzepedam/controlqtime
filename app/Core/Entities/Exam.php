<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Exam extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'type_exam_id', 'emission_exam', 'expired_exam', 'detail_exam',
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
    public function typeExam()
    {
        return $this->belongsTo(TypeExam::class);
    }

    /**
     * @param string $value
     */
    public function setEmissionExamAttribute($value)
    {
        $this->attributes['emission_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value
     */
    public function setExpiredExamAttribute($value)
    {
        $this->attributes['expired_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value
     */
    public function setDetailExamAttribute($value)
    {
        $this->attributes['detail_exam'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
