<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\StudyRepoInterface;
use Controlqtime\Core\Entities\Study;
use Controlqtime\Core\Traits\OperationEntityArray;

class StudyRepo implements StudyRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(Study $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_studies']; $i ++)
		{

			$id = $request['id_study'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new Study([
					'degree_id'            => $request['degree_id'][ $i ],
					'name_study'           => $request['name_study'][ $i ],
					'institution_study_id' => $request['institution_study_id'][ $i ],
					'date_obtention'       => $request['date_obtention'][ $i ]
				]);

				$entity->studies()->save($this->model);

			} else
			{
				$this->model                       = $this->model->find($id);
				$this->model->degree_id            = $request['degree_id'][ $i ];
				$this->model->name_study           = $request['name_study'][ $i ];
				$this->model->institution_study_id = $request['institution_study_id'][ $i ];
				$this->model->date_obtention       = $request['date_obtention'][ $i ];

				$this->model->save();
			}
		}
	}
}