<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Terminal extends Eloquent
{
    protected $fillable = [
        'name', 'address', 'commune_id'
    ];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function commune() {
		return $this->belongsTo(Commune::class);
	}

	/**
	 * @param string $value
	 */
	public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

	/**
	 * @param string $value
	 */
	public function setAddressAttribute($value) {
		$this->attributes['address'] = ucfirst($value);
	}

}
