<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageSpecialityEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageSpecialityEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageSpecialityEmployeeRepo extends BaseUploadRepo implements ImageSpecialityEmployeeRepoInterface {

	protected $model;

	public function __construct(ImageSpecialityEmployee $model)
	{
		$this->model = $model;
	}

}