<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\DetailCollegeStudy;
use Controlqtime\Core\Contracts\DetailCollegeStudyRepoInterface;

class DetailCollegeStudyRepo extends BaseRepo implements DetailCollegeStudyRepoInterface
{
	/**
	 * @var DetailCollegeStudy
	 */
	protected $model;
	
	/**
	 * DetailCollegeStudyRepo constructor.
	 *
	 * @param DetailCollegeStudy $model
	 */
	public function __construct(DetailCollegeStudy $model)
	{
		$this->model = $model;
	}
}