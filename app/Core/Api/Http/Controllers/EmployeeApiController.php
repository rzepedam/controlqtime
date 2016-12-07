<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Http\Request\EmployeeApiRequest;

class EmployeeApiController extends Controller
{
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * EmployeeApiController constructor.
	 *
	 * @param Employee $employee
	 */
	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
	}
	
	/**
	 * @param EmployeeApiRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws Exception
	 */
	public function update(EmployeeApiRequest $request)
	{
		try
		{
			$employee      = $this->employee->whereFirst('rut', $request->get('rut'));
			$employee->url = $request->get('url');
			$employee->save();
			
		} catch (Exception $exception)
		{
			throw new Exception($exception);
		}
		
		return response()->json([
			'success' => true
		]);
	}
}
