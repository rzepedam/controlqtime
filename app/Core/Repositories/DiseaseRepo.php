<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Disease;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Contracts\DiseaseRepoInterface;

class DiseaseRepo extends BaseRepo implements DiseaseRepoInterface
{
	
	use OperationEntityArray, DestroyImageFile;
	
	/**
	 * @var Disease
	 */
	protected $model;
	
	/**
	 * DiseaseRepo constructor.
	 *
	 * @param Disease $model
	 */
	public function __construct(Disease $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_diseases']; $i++)
		{
			
			$id = $request['id_disease'][$i];
			
			if ($id == 0)
			{
				$this->model = new Disease([
					'type_disease_id'   => $request['type_disease_id'][$i],
					'treatment_disease' => $request['treatment_disease' . $i],
					'detail_disease'    => $request['detail_disease'][$i],
				]);
				
				$entity->studies()->save($this->model);
				
			} else
			{
				$this->model                    = $this->model->find($id);
				$this->model->type_disease_id   = $request['type_disease_id'][$i];
				$this->model->treatment_disease = $request['treatment_disease' . $i];
				$this->model->detail_disease    = $request['detail_disease'][$i];
				
				$this->model->save();
			}
		}
	}
}