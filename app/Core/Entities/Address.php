<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
		'address', 'depto', 'block', 'num_home', 'commune_id'
	];
	
	/**
	 * @var bool
	 */
	public $timestamps = false;
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function commune()
	{
        return $this->belongsTo(Commune::class);
	}
	
}
