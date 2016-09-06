<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class TypeCertification extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

	/**
	 * @param string $value
	 */
	public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

}
