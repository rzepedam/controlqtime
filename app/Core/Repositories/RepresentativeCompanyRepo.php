<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RepresentativeCompanyRepoInterface;
use Controlqtime\Core\Entities\RepresentativeCompany;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class RepresentativeCompanyRepo extends BaseRepo implements RepresentativeCompanyRepoInterface {

	use WhereMethodsTrait, OperationEntityArray;

	protected $model;

	public function __construct(RepresentativeCompany $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $company)
	{
		for ($i = 0; $i < $request['count_representative_company']; $i ++)
		{

			$id = $request['id_representative'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new RepresentativeCompany([
					'type_representative_id' => $request['type_representative_id'][ $i ],
					'male_surname'           => $request['male_surname'][ $i ],
					'female_surname'         => $request['female_surname'][ $i ],
					'first_name'             => $request['first_name'][ $i ],
					'second_name'            => $request['second_name'][ $i ],
					'rut_representative'     => $request['rut_representative'][ $i ],
					'birthday'               => $request['birthday'][ $i ],
					'nationality_id'         => $request['nationality_id'][ $i ],
					'email_representative'   => $request['email_representative'][ $i ],
					'phone1_representative'  => $request['phone1_representative'][ $i ],
					'phone2_representative'  => $request['phone2_representative'][ $i ]
				]);

				$company->representativeCompanies()->save($this->model);

			} else
			{
				$this->model                         = parent::find($id);
				$this->model->type_representative_id = $request['type_representative_id'][ $i ];
				$this->model->male_surname           = $request['male_surname'][ $i ];
				$this->model->female_surname         = $request['female_surname'][ $i ];
				$this->model->first_name             = $request['first_name'][ $i ];
				$this->model->second_name            = $request['second_name'][ $i ];
				$this->model->rut_representative     = $request['rut_representative'][ $i ];
				$this->model->birthday               = $request['birthday'][ $i ];
				$this->model->nationality_id         = $request['nationality_id'][ $i ];
				$this->model->email_representative   = $request['email_representative'][ $i ];
				$this->model->phone1_representative  = $request['phone1_representative'][ $i ];
				$this->model->phone2_representative  = $request['phone2_representative'][ $i ];

				$this->model->save();
			}
		}
	}
}