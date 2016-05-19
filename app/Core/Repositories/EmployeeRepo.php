<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;

class EmployeeRepo extends BaseRepo implements EmployeeRepoInterface{

	use ListsTrait, WhereMethodsTrait;

	protected $model;

	public function __construct(Employee $model)
	{
		$this->model = $model;
	}

}