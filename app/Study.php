<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'degree_id', 'name_study', 'institution_study_id', 'date'
    ];

    protected $dates = [
        'date'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function degree() {
        return $this->belongsTo('App\Degree');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institution() {
        return $this->belongsTo('App\Institution', 'institution_study_id');
    }


    /**
     * @param $value
     */
    public function setDateAttribute($value) {
        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

}
