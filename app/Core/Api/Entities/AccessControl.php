<?php

namespace Controlqtime\Core\Api\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class AccessControl extends Eloquent
{
    protected $fillable = array(
		'uuid', 'rut', 'num_device', 'status', 'created_at'
	);

	public $timestamps = false;
}
