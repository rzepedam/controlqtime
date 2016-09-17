<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Entities\FamilyResponsability;
use Controlqtime\Core\Contracts\FamilyResponsabilityRepoInterface;

class FamilyResponsabilityRepo extends BaseRepo implements FamilyResponsabilityRepoInterface
{
	use OperationEntityArray, DestroyImageFile;
	
	/**
	 * @var FamilyResponsability
	 */
	protected $model;
	
	/**
	 * FamilyResponsabilityRepo constructor.
	 *
	 * @param FamilyResponsability $model
	 */
	public function __construct(FamilyResponsability $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_family_responsabilities']; $i++)
		{
			$id = $request['id_family_responsability'][$i];
			
			if ($id == 0)
			{
				$this->model = new FamilyResponsability([
					'name_responsability' => $request['name_responsability'][$i],
					'rut_responsability'  => $request['rut_responsability'][$i],
					'relationship_id'     => $request['relationship_id'][$i],
				]);
				
				$entity->familyResponsabilities()->save($this->model);
				
			} else
			{
				$this->model                      = $this->model->find($id);
				$this->model->name_responsability = $request['name_responsability'][$i];
				$this->model->rut_responsability  = $request['rut_responsability'][$i];
				$this->model->relationship_id     = $request['relationship_id'][$i];
				
				$this->model->save();
			}
		}
	}
}