<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;

class AccessControlApiController extends Controller
{
	/**
	 * @var AccessControlApi
	 */
	protected $access_control;

	/**
	 * AccessControlApiController constructor.
	 *
	 * @param AccessControlApi $access_control
	 */
	public function __construct(AccessControlApi $access_control)
	{
		$this->access_control = $access_control;
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
			$this->access_control->create($request->all());

			return response()->json([
				'success' => true
			]);
		} catch ( Exception $exception ) {
			throw new Exception($exception);
		}
	}
}
