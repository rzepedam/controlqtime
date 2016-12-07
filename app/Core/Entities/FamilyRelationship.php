<?php

namespace Controlqtime\Core\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Controlqtime\Core\Traits\OperationEntityArray;
use Illuminate\Database\Eloquent\Model as Eloquent;

class FamilyRelationship extends Eloquent
{
	use SoftDeletes, OperationEntityArray;
	
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
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_family_relationships']; $i++)
		{
			
			$id = $request['id_family_relationship'][$i];
			
			if ($id == 0)
			{
				$this->model = new FamilyRelationship([
					'relationship_id'    => $request['relationship_id'][$i],
					'employee_family_id' => $request['employee_family_id'][$i]
				]);
				
				$entity->familyRelationships()->save($this->model);
				
			} else
			{
				$this->model                     = $this->model->find($id);
				$this->model->relationship_id    = $request['relationship_id'][$i];
				$this->model->employee_family_id = $request['employee_family_id'][$i];
				
				$this->model->save();
			}
		}
	}
    
}
