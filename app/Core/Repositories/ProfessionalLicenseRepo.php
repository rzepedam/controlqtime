<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ProfessionalLicenseRepoInterface;
use Controlqtime\Core\Entities\ProfessionalLicense;
use Controlqtime\Core\Traits\OperationEntityArray;

class ProfessionalLicenseRepo implements ProfessionalLicenseRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(ProfessionalLicense $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_professional_licenses']; $i ++)
		{

			$id = $request['id_professional_license'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new ProfessionalLicense([
					'type_professional_license_id' => $request['type_professional_license_id'][ $i ],
					'emission_license'             => $request['emission_license'][ $i ],
					'expired_license'              => $request['expired_license'][ $i ],
					'is_donor'                     => $request['is_donor' . $i],
					'detail_license'               => $request['detail_license'][ $i ],
				]);

				$entity->professionalLicenses()->save($this->model);
				$entity->state = 'disable';
				$entity->save();

			} else
			{
				$this->model                               = $this->model->find($id);
				$this->model->type_professional_license_id = $request['type_professional_license_id'][ $i ];
				$this->model->emission_license             = $request['emission_license'][ $i ];
				$this->model->is_donor                     = $request['is_donor' . $i];
				$this->model->detail_license               = $request['detail_license'][ $i ];

				$this->model->save();
			}
		}
	}
}