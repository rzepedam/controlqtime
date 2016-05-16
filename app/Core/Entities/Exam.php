<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Exam extends Eloquent
{
    protected $fillable = [
        'type_exam_id', 'expired_exam', 'detail_exam'
    ];
    
    protected $dates = [
        'expired_exam'
    ];
    
    public function typeExam() {
        return $this->belongsTo('Controlqtime\TypeExam');
    }
    
    public function setExpiredExamAttribute($value) {
        $this->attributes['expired_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }
    
}
