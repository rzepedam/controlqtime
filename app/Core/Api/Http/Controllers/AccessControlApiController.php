<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;

class AccessControlApiController extends Controller
{
	/**
	 * @var AccessControlApi
	 */
	protected $access_control;
	
	/**
	 * @var DailyAssistanceApi
	 */
	protected $daily_assistance;
	
	/**
	 * AccessControlApiController constructor.
	 *
	 * @param AccessControlApi $access_control
	 * @param DailyAssistanceApi $daily_assistance
	 */
	public function __construct(AccessControlApi $access_control, DailyAssistanceApi $daily_assistance)
	{
		$this->access_control   = $access_control;
		$this->daily_assistance = $daily_assistance;
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
			switch ($request->get('num_device'))
			{
				case 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA':
					$this->access_control->create($request->all());
					break;
				
				case 'BC702909-E80E-4695-9790-E1DBCDF6F4EE':
					$this->daily_assistance->create($request->all());
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
