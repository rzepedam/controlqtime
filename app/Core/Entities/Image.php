<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Image extends Eloquent
{
	/**
	 * @var array
	 */
	protected $fillable = [
    	'imagesable_id', 'imagesable_type', 'path', 'orig_name', 'size'
    ];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function imagesable()
	{
		return $this->morphTo();
	}
}
