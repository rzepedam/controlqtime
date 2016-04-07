<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Exam extends Model
{
    protected $fillable = [
        'type_exam_id', 'expired_exam', 'detail_exam'
    ];
    
    
    public function setExpiredExamAttribute($value) {
        $this->attributes['expired_exam'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
