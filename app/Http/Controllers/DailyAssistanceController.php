<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
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
	 * DailyAssistanceController constructor.
	 *
	 * @param AccessControlRepoInterface $access_control
	 * @param DailyAssistanceRepoInterface $daily_assistance
	 */
	public function __construct(AccessControlRepoInterface $access_control, DailyAssistanceRepoInterface $daily_assistance)
	{
		$this->daily_assistance = $daily_assistance;
		$this->access_control   = $access_control;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$date             = Carbon::today();
		$accessControls   = $this->access_control->whereDate('created_at', $date, ['employee']);
		$dailyAssistances = $this->daily_assistance->whereDate('created_at', $date, ['employee']);
		$num_employees    = $accessControls->unique('rut');
		
		return view('human-resources.daily-assistances.index', compact(
			'accessControls', 'dailyAssistances', 'num_employees'
		));
	}
	
}
