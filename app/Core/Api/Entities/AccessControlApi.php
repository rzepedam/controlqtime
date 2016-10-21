<?php

namespace Controlqtime\Core\Api\Entities;

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
}
