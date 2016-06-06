<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageFamilyResponsabilityEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageFamilyResponsabilityEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageFamilyResponsabilityEmployeeRepo extends BaseUploadRepo implements ImageFamilyResponsabilityEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageFamilyResponsabilityEmployee $model)
	{
		$this->model = $model;
	}

}