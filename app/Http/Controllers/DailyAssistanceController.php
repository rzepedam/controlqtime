<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class DailyAssistanceController extends Controller
{
	/**
	 * @var AccessControlApi
	 */
	protected $accessControl;
	
	/**
	 * @var DailyAssistanceApi
	 */
	protected $dailyAssistance;
	
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * DailyAssistanceController constructor.
	 *
	 * @param AccessControlApi   $accessControl
	 * @param DailyAssistanceApi $dailyAssistance
	 * @param Employee           $employee
	 * @param Log                $log
	 */
	public function __construct(AccessControlApi $accessControl, DailyAssistanceApi $dailyAssistance,
		Employee $employee, Log $log)
	{
		$this->accessControl   = $accessControl;
		$this->dailyAssistance = $dailyAssistance;
		$this->employee        = $employee;
		$this->log             = $log;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$date      = Carbon::today();
		$employees = $this->employee->all();
		list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);
		
		return view('human-resources.daily-assistances.index', compact(
			'accessControls', 'dailyAssistances', 'num_employees', 'entry', 'output', 'employees'
		));
	}
	
	/**
	 * @param Request $request date "2016-10-08"
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getAssistanceByDate(Request $request)
	{
		$date     = Carbon::parse($request->get('date'))->format('Y-m-d');
		$employee = $request->get('employee');
		
		switch ( $employee )
		{
			case '*':
				list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);
				break;
			
			default:
				list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDateAndEmployee($employee, $date);
				break;
		}
		
		return response()->json([
			'accessControls'   => $accessControls,
			'dailyAssistances' => $dailyAssistances,
			'num_employees'    => $num_employees,
			'entry'            => $entry,
			'success'          => true
		], 200);
	}
	
	/**
	 * @param $date
	 *
	 * @return array
	 */
	private function getRecordPerDate($date)
	{
		$accessControls   = $this->accessControl->whereDate('created_at', $date, ['employee']);
		$dailyAssistances = $this->dailyAssistance->whereDate('created_at', $date, ['employee']);
		$num_employees    = $accessControls->unique('rut');
		$entry            = $accessControls->groupBy('rut')->transform(function ($item)
		{
			return $item->min('created_at');
		});
		
		return [$accessControls, $dailyAssistances, $num_employees, $entry];
	}
	
	/**
	 * @param $employee
	 * @param $date
	 *
	 * @return array
	 */
	private function getRecordPerDateAndEmployee($employee, $date)
	{
		$accessControls   = $this->accessControl->whereDateAndWhereColumn('created_at', $date, 'employee_id', $employee, ['employee']);
		$dailyAssistances = $this->dailyAssistance->whereDateAndWhereColumn('created_at', $date, 'employee_id', $employee, ['employee']);
		$num_employees    = $accessControls->unique('rut');
		$entry            = $accessControls->groupBy('rut')->transform(function ($item)
		{
			return $item->min('created_at');
		});
		
		return [$accessControls, $dailyAssistances, $num_employees, $entry];
	}
	
}
