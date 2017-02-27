<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class TermAndObligatory extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'default',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function contracts()
    {
        return $this->belongsToMany(Contract::class);
    }

    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setDefaultAttribute($value)
    {
        $this->attributes['default'] = ($value === 'on') ? true : false;
    }
}
