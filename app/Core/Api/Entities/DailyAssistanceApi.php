<?php

namespace Controlqtime\Core\Api\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Helpers\FormatField;
use Controlqtime\Events\AccessNotification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DailyAssistanceApi extends Eloquent
{
    use SoftDeletes;

	/**
	 * @var array
	 */
	protected $events = [
        'saved' => AccessNotification::class,
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'period_every_eight_hour_id', 'rut', 'num_device', 'status', 'created_at',
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
	 * @return static date 2017-07-12
	 */
	public function getNowAttribute()
    {
        return Carbon::now();
    }

	/**
	 * @param string 12345678-9
	 *
	 * @return string '12.345.678-9'
	 */
	public function getRutAttribute($value)
    {
		return FormatField::rut($value);
    }
}
