<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class NumHour extends Eloquent
{
	protected $fillable = array(
		'name'
	);

    public $timestamps = false;

}
