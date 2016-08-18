<?php

namespace Controlqtime\Http\Controllers;

use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\ContractRepoInterface;
use Controlqtime\Core\Contracts\DayTripRepoInterface;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\ForecastRepoInterface;
use Controlqtime\Core\Contracts\GratificationRepoInterface;
use Controlqtime\Core\Contracts\NumHourRepoInterface;
use Controlqtime\Core\Contracts\PensionRepoInterface;
use Controlqtime\Core\Contracts\PeriodicityRepoInterface;
use Controlqtime\Core\Contracts\PositionRepoInterface;
use Controlqtime\Core\Contracts\TypeContractRepoInterface;
use Illuminate\Http\Request;

class ContractController extends Controller
{
	/**
	 * @var ContractRepoInterface
	 */
	protected $contract;
	/**
	 * @var CompanyRepoInterface
	 */
	protected $company;
	/**
	 * @var EmployeeRepoInterface
	 */
	protected $employee;
	/**
	 * @var PositionRepoInterface
	 */
	protected $position;
	/**
	 * @var NumHourRepoInterface
	 */
	protected $numHour;
	/**
	 * @var PeriodicityRepoInterface
	 */
	protected $periodicity;
	/**
	 * @var DayTripRepoInterface
	 */
	protected $dayTrips;
	/**
	 * @var GratificationRepoInterface
	 */
	protected $gratification;
	/**
	 * @var TypeContractRepoInterface
	 */
	protected $typeContract;
	/**
	 * @var PensionRepoInterface
	 */
	protected $pension;
	/**
	 * @var ForecastRepoInterface
	 */
	protected $forecast;

	/**
	 * ContractController constructor.
	 * @param ContractRepoInterface $contract
	 * @param CompanyRepoInterface $company
	 * @param EmployeeRepoInterface $employee
	 * @param PositionRepoInterface $position
	 * @param NumHourRepoInterface $numHour
	 * @param PeriodicityRepoInterface $periodicity
	 * @param DayTripRepoInterface $dayTrips
	 * @param GratificationRepoInterface $gratification
	 * @param TypeContractRepoInterface $typeContract
	 * @param PensionRepoInterface $pension
	 * @param ForecastRepoInterface $forecast
	 */
	public function __construct(ContractRepoInterface $contract, CompanyRepoInterface $company, EmployeeRepoInterface $employee, PositionRepoInterface $position, NumHourRepoInterface $numHour, PeriodicityRepoInterface $periodicity, DayTripRepoInterface $dayTrips, GratificationRepoInterface $gratification, TypeContractRepoInterface $typeContract, PensionRepoInterface $pension, ForecastRepoInterface $forecast)
	{
		$this->contract = $contract;
		$this->company = $company;
		$this->employee = $employee;
		$this->position = $position;
		$this->numHour = $numHour;
		$this->periodicity = $periodicity;
		$this->dayTrips = $dayTrips;
		$this->gratification = $gratification;
		$this->typeContract = $typeContract;
		$this->pension = $pension;
		$this->forecast = $forecast;
	}

	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getContracts()
	{
		$contracts = $this->contract->all();

		return $contracts;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('human-resources.contracts.index');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function create()
	{
		$companies = $this->company->lists('firm_name', 'id');
		$employees = $this->employee->lists('full_name', 'id');
		$positions = $this->position->lists('name', 'id');
		$numHours = $this->numHour->lists('name', 'id');
		$periodicities = $this->periodicity->lists('name', 'id');
		$dayTrips = $this->dayTrips->lists('name', 'id');
		$gratifications = $this->gratification->lists('name', 'id');
		$typeContracts = $this->typeContract->lists('name', 'id');
		$pensions = $this->pension->lists('name', 'id');
		$forecasts = $this->forecast->lists('name', 'id');

		return view('human-resources.contracts.create', compact(
			'companies', 'employees', 'positions', 'numHours', 'periodicities', 'dayTrips',
			'gratifications', 'typeContracts', 'pensions', 'forecasts'
		));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
