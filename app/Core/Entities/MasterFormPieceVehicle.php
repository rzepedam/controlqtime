<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class MasterFormPieceVehicle extends Eloquent
{
	use SoftDeletes;
	
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
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pieceVehicles()
    {
        return $this->belongsToMany(PieceVehicle::class);
    }

    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

}
