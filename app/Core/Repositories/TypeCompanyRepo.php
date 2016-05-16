<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeCompanyRepoInterface;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Entities\TypeCompany;
use Controlqtime\Core\Traits\ListsTrait;

class TypeCompanyRepo extends BaseRepo implements TypeCompanyRepoInterface{
	
	use ListsTrait;
	
	protected $model;

	public function __construct(TypeCompany $model)
	{
		$this->model = $model;
	}
	
}