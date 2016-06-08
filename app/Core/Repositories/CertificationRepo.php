<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CertificationRepoInterface;
use Controlqtime\Core\Entities\Certification;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\DestroyImageFile;
use Controlqtime\Core\Traits\OperationEntityArray;

class CertificationRepo extends BaseRepo implements CertificationRepoInterface {

	use OperationEntityArray, DestroyImageFile;

	protected $model;

	public function __construct(Certification $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_certifications']; $i ++)
		{

			$id = $request['id_certification'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new Certification([
					'type_certification_id'        => $request['type_certification_id'][ $i ],
					'institution_certification_id' => $request['institution_certification_id'][ $i ],
					'emission_certification'       => $request['emission_certification'][ $i ],
					'expired_certification'        => $request['expired_certification'][ $i ],
				]);

				$entity->certifications()->save($this->model);
				$entity->state = 'disable';
				$entity->save();

			} else
			{
				$this->model                               = $this->model->find($id);
				$this->model->type_certification_id        = $request['type_certification_id'][ $i ];
				$this->model->institution_certification_id = $request['institution_certification_id'][ $i ];
				$this->model->emission_certification       = $request['emission_certification'][ $i ];
				$this->model->expired_certification        = $request['expired_certification'][ $i ];

				$this->model->save();
			}
		}
	}
	
}