<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Controlqtime\Helpers\Helper;
use Dingo\Api\Routing\Helpers;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Api\Http\Requests\EmployeeRequest;
use Controlqtime\Core\Api\Transformers\EmployeeTransformer;

class EmployeeController extends Controller
{
	use Helpers;

	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;

	/**
	 * EmployeeController constructor.
	 * @param EmployeeRepoInterface $employee
	 */
	public function __construct(EmployeeRepoInterface $employee)
	{
		$this->employee = $employee;
	}

	/**
	 * @param EmployeeRequest $request
	 * @return \Dingo\Api\Http\Response
	 */
	public function update(EmployeeRequest $request)
    {
    	$rut = Helper::formatedRut($request->get('rut'));

		try
		{
			$employee = $this->employee->whereFirst('rut', $rut);
			$employee->url = $request->get('url');
			$employee->save();

			return $this->response->item($employee, new EmployeeTransformer());
		}catch(ModelNotFoundException $e) {
			throw new NotFoundHttpException;
		}
    }

}
