<?php

namespace Controlqtime\Core\Api\Transformers;

use Controlqtime\Core\Entities\Employee;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
	public function transform(Employee $employee)
	{
		return [
			'rut'			=> $employee->rut,
			'url'			=> $employee->url,
			'updated_at'	=> $employee->updated_at
		];
	}
}