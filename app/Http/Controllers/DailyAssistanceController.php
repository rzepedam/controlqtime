<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Http\Request;
use Controlqtime\Core\Contracts\DailyAssistanceRepoInterface;

class DailyAssistanceController extends Controller
{
	
	/**
	 * @var DailyAssistanceRepoInterface
	 */
	protected $daily_assistance;
	
	/**
	 * DailyAssistanceController constructor.
	 *
	 * @param DailyAssistanceRepoInterface $daily_assistance
	 */
	public function __construct(DailyAssistanceRepoInterface $daily_assistance)
	{
		$this->daily_assistance = $daily_assistance;
	}
	
	/**
	 * @return mixed for Bootstrap-Table
	 */
	public function getDailyAssistances()
	{
	    $dailyAssistances = $this->daily_assistance->all();
		
		return $dailyAssistances;
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('human-resources.daily-assistances.index');
    }
	
}
