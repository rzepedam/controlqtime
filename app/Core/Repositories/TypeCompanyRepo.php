<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;

class TypeCompanyRepo extends BaseRepo implements TypeCompanyRepoInterface
{
	use ListsTrait;
	
	/**
	 * @var TypeCompany
	 */
	protected $model;
	
	/**
	 * TypeCompanyRepo constructor.
	 *
	 * @param TypeCompany $model
	 */
	public function __construct(TypeCompany $model)
	{
		$this->model = $model;
	}
	
}