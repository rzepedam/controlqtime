<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PieceVehicle extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
    	'name'
	];

	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function masterFormPieceVehicles() {
		return $this->belongsToMany(MasterFormPieceVehicle::class);
	}

	
	/**
	 * @param string $value
	 */
	public function setNameAttribute($value) {
		$this->attributes['name'] = ucfirst($value);
	}
}
