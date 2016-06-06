<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Exam extends Eloquent
{
    protected $fillable = [
        'type_exam_id', 'emission_exam', 'expired_exam', 'detail_exam'
    ];
    
    protected $dates = [
        'emission_exam', 'expired_exam'
    ];

    /*
     * Relationships
     */

    public function imageExamEmployees() {
        return $this->hasMany(ImageExamEmployee::class);
    }

    public function typeExam() {
        return $this->belongsTo(TypeExam::class);
    }

    /*
     * Mutators
     */

    public function setEmissionExamAttribute($value) {
        $this->attributes['emission_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    public function setExpiredExamAttribute($value) {
        $this->attributes['expired_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}
