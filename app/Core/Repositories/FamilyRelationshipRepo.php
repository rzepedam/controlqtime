<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\FamilyRelationship;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Contracts\FamilyRelationshipRepoInterface;

class FamilyRelationshipRepo implements FamilyRelationshipRepoInterface
{
	use OperationEntityArray;
	
	/**
	 * @var FamilyRelationship
	 */
	protected $model;
	
	/**
	 * FamilyRelationshipRepo constructor.
	 *
	 * @param FamilyRelationship $model
	 */
	public function __construct(FamilyRelationship $model)
	{
		$this->model = $model;
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