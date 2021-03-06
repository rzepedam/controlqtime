<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Address extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'addressable_id', 'addressable_type', 'address', 'commune_id', 'phone1', 'phone2',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailAddressLegalEmployee()
    {
        return $this->hasOne(DetailAddressLegalEmployee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detailAddressCompany()
    {
        return $this->hasOne(DetailAddressCompany::class);
    }

    /**
     * @param string $value
     */
    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = ucfirst($value);
    }
}
