<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ImageProfessionalLicenseEmployeeRepoInterface;
use Controlqtime\Core\Entities\ImageProfessionalLicenseEmployee;
use Controlqtime\Core\Repositories\Base\BaseUploadRepo;

class ImageProfessionalLicenseEmployeeRepo extends BaseUploadRepo implements ImageProfessionalLicenseEmployeeRepoInterface{

	protected $model;

	public function __construct(ImageProfessionalLicenseEmployee $model)
	{
		$this->model = $model;
	}

}