<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Controlqtime\Core\Contracts\TypeProfessionalLicenseRepoInterface;

class TypeProfessionalLicenseRepo extends BaseRepo implements TypeProfessionalLicenseRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeProfessionalLicense
	 */
	protected $model;
	
	/**
	 * TypeProfessionalLicenseRepo constructor.
	 *
	 * @param TypeProfessionalLicense $model
	 */
	public function __construct(TypeProfessionalLicense $model)
	{
		$this->model = $model;
	}
	
}