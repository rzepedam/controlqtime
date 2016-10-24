<?php

namespace Controlqtime\Core\Api\Entities;

use Carbon\Carbon;
use Controlqtime\Core\Entities\Employee;
use Illuminate\Database\Eloquent\Model as Eloquent;

class AccessControlApi extends Eloquent
{
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'rut', 'num_device', 'status', 'created_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
	
	/**
	 * @param $value "2016-10-21 17:08_05"
	 *
	 * @return mixed "17:08:05"
	 */
	public function getCreatedAtAttribute($value)
	{
	    return Carbon::parse($value)->format('H:i:s');
	}
	
}
