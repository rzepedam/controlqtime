<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class MasterPieceVehicle extends Eloquent
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
}
