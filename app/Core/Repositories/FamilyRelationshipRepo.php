<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\FamilyRelationshipRepoInterface;
use Controlqtime\Core\Entities\FamilyRelationship;
use Controlqtime\Core\Traits\OperationEntityArray;

class FamilyRelationshipRepo implements FamilyRelationshipRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(FamilyRelationship $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_family_relationships']; $i ++)
		{

			$id = $request['id_family_relationship'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new FamilyRelationship([
					'relationship_id'    => $request['relationship_id'][ $i ],
					'employee_family_id' => $request['employee_family_id'][ $i ]
				]);

				$entity->familyRelationships()->save($this->model);

			} else
			{
				$this->model                     = parent::find($id);
				$this->model->relationship_id    = $request['relationship_id'][ $i ];
				$this->model->employee_family_id = $request['employee_family_id'][ $i ];

				$this->model->save();
			}
		}
	}
}