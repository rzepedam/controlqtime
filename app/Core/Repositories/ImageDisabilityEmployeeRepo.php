<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageDisabilityEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageDisabilityEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageDisabilityEmployeeRepo extends BaseUploadRepo implements ImageDisabilityEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageDisabilityEmployee $model)
	{
		$this->model = $model;
	}

}