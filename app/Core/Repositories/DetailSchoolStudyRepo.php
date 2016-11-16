<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\DetailSchoolStudy;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\DetailSchoolStudyRepoInterface;

class DetailSchoolStudyRepo extends BaseRepo implements DetailSchoolStudyRepoInterface
{
	/**
	 * @var DetailSchoolStudy
	 */
	protected $model;
	
	/**
	 * DetailSchoolStudyRepo constructor.
	 *
	 * @param DetailSchoolStudy $model
	 */
	public function __construct(DetailSchoolStudy $model)
	{
		$this->model = $model;
	}
}