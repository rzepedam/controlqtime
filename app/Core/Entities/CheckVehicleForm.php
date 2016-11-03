<?php

namespace Controlqtime\Core\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CheckVehicleForm extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'user_id', 'vehicle_id', 'master_form_piece_vehicle_id'
	];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function masterFormPieceVehicle()
	{
        return $this->belongsTo(MasterFormPieceVehicle::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
        return $this->belongsTo(User::class);
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
	 * @param $value (2016-09-21 10:48:45)
	 *
	 * @return string (01-10-2016)
	 */
	public function getCreatedAtAttribute($value)
	{
		return Carbon::parse($value)->format('d-m-Y');
	}
	
}
