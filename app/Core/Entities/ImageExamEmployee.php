<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\Model as Eloquent;

class ImageExamEmployee extends Eloquent
{
	protected $fillable = [
		'exam_id', 'path', 'orig_name', 'size'
	];

	/*
	 * Relationships
	 */

	public function exam() {
		return $this->belongsTo(Exam::class);
	}

}
