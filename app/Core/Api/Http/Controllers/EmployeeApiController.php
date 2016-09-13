<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Api\Http\Request\EmployeeApiRequest;

class EmployeeApiController extends Controller
{
	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;

	/**
	 * EmployeeApiController constructor.
	 *
	 * @param EmployeeRepoInterface $employee
	 */
	public function __construct(EmployeeRepoInterface $employee)
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

			return response()->json(['success' => true,]);
		} catch ( Exception $exception ) {
			throw new Exception($exception);
		}
	}
}
