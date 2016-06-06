<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\SpecialityRepoInterface;
use Controlqtime\Core\Entities\Speciality;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;

class SpecialityRepo extends BaseRepo implements SpecialityRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(Speciality $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_specialities']; $i ++)
		{

			$id = $request['id_speciality'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new Speciality([
					'type_speciality_id'        => $request['type_speciality_id'][ $i ],
					'institution_speciality_id' => $request['institution_speciality_id'][ $i ],
					'emission_speciality'       => $request['emission_speciality'][ $i ],
					'expired_speciality'        => $request['expired_speciality'][ $i ],
				]);

				$entity->certifications()->save($this->model);
				$entity->state = 'disable';
				$entity->save();

			} else
			{
				$this->model                            = $this->model->find($id);
				$this->model->type_speciality_id        = $request['type_speciality_id'][ $i ];
				$this->model->institution_speciality_id = $request['institution_speciality_id'][ $i ];
				$this->model->emission_speciality       = $request['emission_speciality'][ $i ];
				$this->model->expired_speciality        = $request['expired_speciality'][ $i ];

				$this->model->save();
			}
		}
	}
}