<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class DetailAddressCompany extends Eloquent
{
    /**
     * @var array
     */
    protected $fillable = [
        'lot', 'bod', 'ofi', 'floor',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
