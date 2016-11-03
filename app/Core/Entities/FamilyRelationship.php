<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyRelationship extends Eloquent
{
	use SoftDeletes;
	
    /**
     * @var array
     */
    protected $fillable = [
        'relationship_id', 'employee_family_id'
    ];
	
	/**
	 * @var array
	 */
	protected $dates = [
		'deleted_at'
	];
	

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function relationship()
    {
        return $this->belongsTo(Relationship::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employeeFamily()
    {
        return $this->belongsTo(Employee::class, 'employee_family_id');
    }

}
