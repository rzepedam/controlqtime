<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailBus extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'detail_vehicle_id', 'carr', 'num_plazas'
	];
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function detailVehicle()
	{
		return $this->belongsTo(DetailVehicle::class);
	}
	
	/**
	 * @param string $value
	 */
	public function setCarrAttribute($value)
	{
		$this->attributes['carr'] = ucfirst(mb_strtolower($value, 'utf-8'));
	}
	
}
