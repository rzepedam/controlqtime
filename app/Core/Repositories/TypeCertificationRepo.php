<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeCertificationRepoInterface;

class TypeCertificationRepo extends BaseRepo implements TypeCertificationRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeCertification
	 */
	protected $model;
	
	/**
	 * TypeCertificationRepo constructor.
	 *
	 * @param TypeCertification $model
	 */
	public function __construct(TypeCertification $model)
	{
		$this->model = $model;
	}
}