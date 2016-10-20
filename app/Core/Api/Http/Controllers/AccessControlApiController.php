<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;

class AccessControlApiController extends Controller
{
	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;
	
	/**
	 * AccessControlApiController constructor.
	 *
	 * @param EmployeeRepoInterface $employee
	 */
	public function __construct(EmployeeRepoInterface $employee)
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
			$employee = $this->employee->whereFirst('rut', $request->get('rut'));
			
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
			'success' => true
		]);
	}
}
