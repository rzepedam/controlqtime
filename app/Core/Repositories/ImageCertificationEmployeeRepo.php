<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageCertificationEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageCertificationEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageCertificationEmployeeRepo extends BaseUploadRepo implements ImageCertificationEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageCertificationEmployee $model)
	{
		$this->model = $model;
	}

}