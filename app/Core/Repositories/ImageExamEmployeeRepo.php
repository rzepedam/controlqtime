<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageExamEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageExamEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageExamEmployeeRepo extends BaseUploadRepo implements ImageExamEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageExamEmployee $model)
	{
		$this->model = $model;
	}

}