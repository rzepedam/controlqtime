<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Study;
use Controlqtime\Core\Traits\OperationEntityArray;
use Controlqtime\Core\Contracts\StudyRepoInterface;

class StudyRepo implements StudyRepoInterface
{
	use OperationEntityArray;
	
	/**
	 * @var Study
	 */
	protected $model;
	
	/**
	 * StudyRepo constructor.
	 *
	 * @param Study $model
	 */
	public function __construct(Study $model)
	{
		$this->model = $model;
	}
	
	/**
	 * @param array $request
	 * @param $entity
	 */
	public function createOrUpdateWithArray(array $request, $entity)
	{
		for ($i = 0; $i < $request['count_studies']; $i++)
		{
			$id = $request['id_study'][$i];
			
			if ($id == 0)
			{
				$study = $this->model->create([
					'employee_id'    => $entity->id,
					'degree_id'      => $request['degree_id'][$i],
					'date_obtention' => $request['date_obtention'][$i]
				]);
				
				switch ($request['degree_id'][$i])
				{
					case 1:
					case 2:
						$study->detailSchoolStudy()->create([
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 3:
						$study->detailTechnicalStudy()->create([
							'name_study'       => $request['name_study'][$i],
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
						$study->detailCollegeStudy()->create([
							'name_study'           => $request['name_study'][$i],
							'institution_study_id' => $request['institution_study_id'][$i]
						]);
						break;
				}
				
			} else
			{
				$this->model                 = $this->model->findOrFail($id);
				$this->model->degree_id      = $request['degree_id'][$i];
				$this->model->date_obtention = $request['date_obtention'][$i];
				
				switch ($request['degree_id'][$i])
				{
					case 1:
					case 2:
						$this->model->detailSchoolStudy()->update([
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 3:
						$this->model->detailTechnicalStudy()->update([
							'name_study'       => $request['name_study'][$i],
							'name_institution' => $request['name_institution'][$i]
						]);
						break;
					
					case 4:
					case 5:
					case 6:
					case 7:
					case 8:
						$this->model->detailCollegeStudy()->update([
							'name_study'           => $request['name_study'][$i],
							'institution_study_id' => $request['institution_study_id'][$i]
						]);
						break;
				}
				
				$this->model->save();
			}
		}
	}
}