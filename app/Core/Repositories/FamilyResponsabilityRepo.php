<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\FamilyResponsabilityRepoInterface;
use Controlqtime\Core\Entities\FamilyResponsability;
use Controlqtime\Core\Traits\OperationEntityArray;

class FamilyResponsabilityRepo implements FamilyResponsabilityRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(FamilyResponsability $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_family_responsabilities']; $i ++)
		{
			$id = $request['id_family_responsability'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new FamilyResponsability([
					'name_responsability' => $request['name_responsability'][ $i ],
					'rut_responsability'  => $request['rut_responsability'][ $i ],
					'relationship_id'     => $request['relationship_id'][ $i ],
				]);

				$entity->familyResponsabilities()->save($this->model);

			} else
			{
				$this->model                      = parent::find($id);
				$this->model->name_responsability = $request['name_responsability'][ $i ];
				$this->model->rut_responsability  = $request['rut_responsability'][ $i ];
				$this->model->relationship_id     = $request['relationship_id'][ $i ];

				$this->model->save();
			}
		}
	}
}