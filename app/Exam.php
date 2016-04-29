<?php

namespace Controlqtime;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exam extends Model
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
