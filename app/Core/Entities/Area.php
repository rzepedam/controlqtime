<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Area extends Eloquent
{
	protected $fillable = [
		'name', 'terminal_id'
	];

	public $timestamps = false;

    /*
     * Relationships
     */

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function terminal() {
        return $this->belongsTo(Terminal::class);
    }
}
