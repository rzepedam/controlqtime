<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageIdentityCardEmployee extends Eloquent
{
	protected $fillable = [
		'employee_id', 'path', 'orig_name', 'size'
	];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee() {
		return $this->belongsTo(Employee::class);
	}
}