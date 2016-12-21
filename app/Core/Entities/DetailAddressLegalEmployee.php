<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailAddressLegalEmployee extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
    	'depto', 'block', 'num_home'
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
	public function address()
	{
        return $this->belongsTo(Address::class);
	}
}
