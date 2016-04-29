<?php

namespace Controlqtime;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'degree_id', 'name_study', 'institution_study_id', 'date_obtention'
    ];

    protected $dates = [
        'date_obtention'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function degree() {
        return $this->belongsTo('Controlqtime\Degree');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution() {
        return $this->belongsTo('Controlqtime\Institution', 'institution_study_id');
    }


    /**
     * @param $value
     */
    public function setDateAttribute($value) {
        $this->attributes['date_obtention'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
