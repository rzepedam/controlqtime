<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Region extends Eloquent
{
	public function provinces()
	{
		return $this->hasMany(Province::class);
	}
	
}
