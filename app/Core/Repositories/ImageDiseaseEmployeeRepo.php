<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageDiseaseEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageDiseaseEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageDiseaseEmployeeRepo extends BaseUploadRepo implements ImageDiseaseEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageDiseaseEmployee $model)
	{
		$this->model = $model;
	}

}