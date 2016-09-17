<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Traits\ListsTrait;
use Controlqtime\Core\Traits\WhereMethodsTrait;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;

class EmployeeRepo extends BaseRepo implements EmployeeRepoInterface
{
	use ListsTrait, WhereMethodsTrait;
	
	/**
	 * @var Employee
	 */
	protected $model;
	
	/**
	 * EmployeeRepo constructor.
	 *
	 * @param Employee $model
	 */
	public function __construct(Employee $model)
	{
		$this->model = $model;
	}
	
}