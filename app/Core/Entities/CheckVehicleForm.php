<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CheckVehicleForm extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'employee_id', 'vehicle_id', 'master_form_piece_vehicle_id'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee()
	{
        return $this->belongsTo(Employee::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function vehicle()
	{
		return $this->belongsTo(Vehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function statePieceVehicles()
	{
		return $this->belongsToMany(StatePieceVehicle::class);
	}
	
	
	/**
	 * @param date $value (2016-09-21 10:48:45)
	 *
	 * @return string (01-10-2016)
	 */
	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
	
}
