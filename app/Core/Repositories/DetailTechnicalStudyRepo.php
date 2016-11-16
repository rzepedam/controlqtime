<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\DetailTechnicalStudy;
use Controlqtime\Core\Contracts\DetailTechnicalStudyRepoInterface;

class DetailTechnicalStudyRepo extends BaseRepo implements DetailTechnicalStudyRepoInterface
{
	/**
	 * @var DetailTechnicalStudy
	 */
	protected $model;
	
	/**
	 * DetailTechnicalStudyRepo constructor.
	 *
	 * @param DetailTechnicalStudy $model
	 */
	public function __construct(DetailTechnicalStudy $model)
	{
		$this->model = $model;
	}
}