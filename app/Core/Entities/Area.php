<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Eloquent
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'terminal_id',
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terminal()
    {
        return $this->belongsTo(Terminal::class)
            ->withTrashed();
    }

    public function contracts()
    {
		return $this->hasMany(Contract::class);
    }

    /**
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }
}
