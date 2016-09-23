<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Disability;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Contracts\DisabilityRepoInterface;

class DisabilityRepo extends BaseRepo implements DisabilityRepoInterface
{
	
	use OperationEntityArray, DestroyImageFile;
	
	/**
	 * @var Disability
	 */
	protected $model;
	
	/**
	 * DisabilityRepo constructor.
	 *
	 * @param Disability $model
	 */
	public function __construct(Disability $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_disabilities']; $i++)
		{
			
			$id = $request['id_disability'][$i];
			
			if ($id == 0)
			{
				$this->model = new Disability([
					'type_disability_id'   => $request['type_disability_id'][$i],
					'treatment_disability' => $request['treatment_disability' . $i],
					'detail_disability'    => $request['detail_disability'][$i],
				]);
				
				$entity->studies()->save($this->model);
				
			} else
			{
				$this->model                       = $this->model->find($id);
				$this->model->type_disability_id   = $request['type_disability_id'][$i];
				$this->model->treatment_disability = $request['treatment_disability' . $i];
				$this->model->detail_disability    = $request['detail_disability'][$i];
				
				$this->model->save();
			}
		}
	}
}