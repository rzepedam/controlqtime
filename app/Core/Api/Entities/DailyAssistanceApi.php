<?php

namespace Controlqtime\Core\Api\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Entities\Employee;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyAssistanceApi extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'rut', 'num_device', 'status', 'created_at',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return mixed "17:08:05"
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }

    public function getNowAttribute()
    {
        return \Carbon\Carbon::now();
    }
}
