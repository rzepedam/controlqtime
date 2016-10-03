<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailBuses extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable =[
		'num_plazas', 'carr'
    ];
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function detailBus()
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
