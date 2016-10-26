<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\AccessControlRepoInterface;
use Controlqtime\Core\Contracts\DailyAssistanceRepoInterface;

class DailyAssistanceController extends Controller
{
	/**
	 * @var AccessControlRepoInterface
	 */
	protected $access_control;
	
	/**
	 * @var DailyAssistanceRepoInterface
	 */
	protected $daily_assistance;
	
	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;
	
	/**
	 * DailyAssistanceController constructor.
	 *
	 * @param AccessControlRepoInterface $access_control
	 * @param DailyAssistanceRepoInterface $daily_assistance
	 * @param EmployeeRepoInterface $employee
	 */
	public function __construct(AccessControlRepoInterface $access_control, DailyAssistanceRepoInterface $daily_assistance, EmployeeRepoInterface $employee)
	{
		$this->access_control   = $access_control;
		$this->daily_assistance = $daily_assistance;
		$this->employee         = $employee;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$date      = Carbon::today();
		$employees = $this->employee->lists('full_name', 'id');
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
		$date = Carbon::parse($request->get('date'))->format('Y-m-d');
		list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);
		
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
		$accessControls   = $this->access_control->whereDate('created_at', $date, ['employee']);
		$dailyAssistances = $this->daily_assistance->whereDate('created_at', $date, ['employee']);
		$num_employees    = $accessControls->unique('rut');
		$entry            = $accessControls->groupBy('rut')->transform(function ($item)
		{
			return $item->min('created_at');
		});
		
		return [$accessControls, $dailyAssistances, $num_employees, $entry];
	}
	
}
