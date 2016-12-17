<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;

class AccessControlApiController extends Controller
{
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * AccessControlApiController constructor.
	 *
	 * @param Employee $employee
	 */
	public function __construct(Employee $employee)
	{
		$this->employee = $employee;
	}
	
	/**
	 * @param AccessControlApiRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 * @throws Exception
	 */
	public function store(AccessControlApiRequest $request)
	{
		try
		{
			$employee = $this->employee->where('rut', $request->get('rut'))->firstOrFail();
		
			switch ($request->get('num_device'))
			{
				case 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA':
					$employee->accessControls()->create($request->all());
					break;
				
				case 'BC702909-E80E-4695-9790-E1DBCDF6F4EE':
					$employee->dailyAssistances()->create($request->all());
					break;
			}
			
		} catch (Exception $e)
		{
			throw new Exception($e);
		}
		
		return response()->json([
			'status' => true
		]);
	}
}
