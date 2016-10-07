<?php

namespace Controlqtime\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Controlqtime\Http\Requests\ContractRequest;
use Controlqtime\Core\Contracts\AreaRepoInterface;
use Controlqtime\Core\Contracts\CompanyRepoInterface;
use Controlqtime\Core\Contracts\DayTripRepoInterface;
use Controlqtime\Core\Contracts\NumHourRepoInterface;
use Controlqtime\Core\Contracts\ContractRepoInterface;
use Controlqtime\Core\Contracts\EmployeeRepoInterface;
use Controlqtime\Core\Contracts\PositionRepoInterface;
use Controlqtime\Core\Contracts\PeriodicityRepoInterface;
use Controlqtime\Core\Contracts\ActivateEmployeeInterface;
use Controlqtime\Core\Contracts\TypeContractRepoInterface;
use Controlqtime\Core\Contracts\GratificationRepoInterface;
use Controlqtime\Core\Contracts\TermAndObligatoryRepoInterface;

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
	 * @var TermAndObligatoryRepoInterface
	 */
	protected $termAndObligatory;
	
	/**
	 * @var AreaRepoInterface
	 */
	protected $area;
	
	/**
	 * @var ActivateEmployeeInterface
	 */
	protected $activateEmployee;
	
	/**
	 * ContractController constructor.
	 *
	 * @param ContractRepoInterface $contract
	 * @param CompanyRepoInterface $company
	 * @param EmployeeRepoInterface $employee
	 * @param PositionRepoInterface $position
	 * @param NumHourRepoInterface $numHour
	 * @param PeriodicityRepoInterface $periodicity
	 * @param DayTripRepoInterface $dayTrips
	 * @param GratificationRepoInterface $gratification
	 * @param TypeContractRepoInterface $typeContract
	 * @param TermAndObligatoryRepoInterface $termAndObligatory
	 * @param AreaRepoInterface $area
	 * @param ActivateEmployeeInterface $activateEmployee
	 */
	public function __construct(ContractRepoInterface $contract, CompanyRepoInterface $company, EmployeeRepoInterface $employee, PositionRepoInterface $position, NumHourRepoInterface $numHour, PeriodicityRepoInterface $periodicity, DayTripRepoInterface $dayTrips, GratificationRepoInterface $gratification, TypeContractRepoInterface $typeContract, TermAndObligatoryRepoInterface $termAndObligatory, AreaRepoInterface $area, ActivateEmployeeInterface $activateEmployee)
	{
		$this->contract          = $contract;
		$this->company           = $company;
		$this->employee          = $employee;
		$this->position          = $position;
		$this->numHour           = $numHour;
		$this->periodicity       = $periodicity;
		$this->dayTrips          = $dayTrips;
		$this->gratification     = $gratification;
		$this->typeContract      = $typeContract;
		$this->termAndObligatory = $termAndObligatory;
		$this->area              = $area;
		$this->activateEmployee  = $activateEmployee;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getContracts()
	{
		$contracts = $this->contract->all(['employee', 'company']);
		
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
		$companies            = $this->company->whereLists('state', 'enable', 'firm_name');
		$employees            = $this->employee->lists('full_name', 'id');
		$positions            = $this->position->lists('name', 'id');
		$areas                = $this->area->lists('name', 'id');
		$numHours             = $this->numHour->lists('name', 'id');
		$periodicities        = $this->periodicity->lists('name', 'id');
		$dayTrips             = $this->dayTrips->lists('name', 'id');
		$gratifications       = $this->gratification->lists('name', 'id');
		$typeContracts        = $this->typeContract->lists('name', 'id');
		$termsAndObligatories = $this->termAndObligatory->all();
		
		return view('human-resources.contracts.create', compact(
			'companies', 'employees', 'positions', 'areas', 'numHours', 'periodicities', 'dayTrips',
			'gratifications', 'typeContracts', 'termsAndObligatories'
		));
	}
	
	/**
	 * @param ContractRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function store(ContractRequest $request)
	{
		DB::beginTransaction();
		
		try
		{
			$contract = $this->contract->create($request->all());
			$contract->termsAndObligatories()->attach($request->get('term_and_obligatory_id'));
			$this->activateEmployee->checkStateUpdateEmployee($request->get('employee_id'));
			
			DB::commit();
		} catch (Exception $e)
		{
			DB::rollBack();
		}
		
		return response()->json([
			'status' => true,
			'url'    => '/human-resources/contracts'
		]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$contract = $this->contract->find($id, [
			'company.commune.province', 'employee.address.commune.province.region',
			'position', 'area', 'numHour', 'periodicityHour', 'dayTrip', 'periodicityWork',
			'gratification', 'typeContract', 'termsAndObligatories', 'company.legalRepresentative'
		]);
		
		return view('human-resources.contracts.show', compact('contract'));
	}
	
	/**
	 * @param $id
	 *
	 * @return pdf generate in new tab
	 */
	public function getPdf($id)
	{
		$contract = $this->contract->find($id, [
			'company.commune.province', 'employee.address.commune.province.region',
			'position', 'area', 'numHour', 'periodicityHour', 'dayTrip', 'periodicityWork',
			'gratification', 'typeContract', 'termsAndObligatories', 'company.legalRepresentative'
		]);
		
		$header = view('human-resources.contracts.partials.pdf.header');
		$footer = view('human-resources.contracts.partials.pdf.footer');
		$pdf    = \PDF::loadView('human-resources.contracts.partials.pdf.index', compact('contract'))
			->setOption('page-size', 'letter')
			->setOption('margin-top', '25mm')
			->setOption('margin-bottom', '14mm')
			->setOption('margin-left', '20mm')
			->setOption('margin-right', '20mm')
			->setOption('header-spacing', '4')
			->setOption('header-html', $header)
			->setOption('footer-html', $footer);
		
		return $pdf->inline();
		
	}
	
}
