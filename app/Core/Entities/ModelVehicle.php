<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class ModelVehicle extends Eloquent
{
	use SoftDeletes;
	
	/**
	 * @var array
	 */
	protected $fillable = [
		'name', 'trademark_id'
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
    public function trademark()
    {
        return $this->belongsTo(Trademark::class);
    }

    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}
