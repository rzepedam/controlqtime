<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ExamRepoInterface;
use Controlqtime\Core\Entities\Exam;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\OperationEntityArray;

class ExamRepo extends BaseRepo implements ExamRepoInterface {

	use OperationEntityArray;

	protected $model;

	public function __construct(Exam $model)
	{
		$this->model = $model;
	}

	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_exams']; $i ++)
		{
			$id = $request['id_exam'][ $i ];

			if ( $id == 0 )
			{
				$this->model = new Exam([
					'type_exam_id'  => $request['type_exam_id'][ $i ],
					'emission_exam' => $request['emission_exam'][ $i ],
					'expired_exam'  => $request['expired_exam'][ $i ],
					'detail_exam'   => $request['detail_exam'][ $i ],
				]);

				$entity->exams()->save($this->model);

			} else
			{
				$this->model                = $this->model->find($id);
				$this->model->type_exam_id  = $request['type_exam_id'][ $i ];
				$this->model->emission_exam = $request['emission_exam'][ $i ];
				$this->model->expired_exam  = $request['expired_exam'][ $i ];
				$this->model->detail_exam   = $request['detail_exam'][ $i ];

				$this->model->save();
			}
		}
	}
}