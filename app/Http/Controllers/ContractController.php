<?php

namespace Controlqtime\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\DayTrip;
use Controlqtime\Core\Entities\NumHour;
use Controlqtime\Core\Entities\Contract;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Entities\Position;
use Controlqtime\Core\Entities\Periodicity;
use Controlqtime\Core\Entities\TypeContract;
use Controlqtime\Http\Requests\ContractRequest;
use Controlqtime\Core\Entities\ActivateEmployee;
use Controlqtime\Core\Entities\TermAndObligatory;

class ContractController extends Controller
{
	/**
	 * @var ActivateEmployee
	 */
	protected $activateEmployee;
	
	/**
	 * @var Area
	 */
	protected $area;
	
	/**
	 * @var Company
	 */
	protected $company;
	
	/**
	 * @var Contract
	 */
	protected $contract;
	
	/**
	 * @var DayTrip
	 */
	protected $dayTrip;
	
	/**
	 * @var Employee
	 */
	protected $employee;
	
	/**
	 * @var Log
	 */
	protected $log;
	
	/**
	 * @var NumHour
	 */
	protected $numHour;
	
	/**
	 * @var Periodicity
	 */
	protected $periodicity;
	
	/**
	 * @var Position
	 */
	protected $position;
	
	/**
	 * @var TermAndObligatory
	 */
	protected $termAndObligatory;
	
	/**
	 * @var TypeContract
	 */
	protected $typeContract;
	
	/**
	 * ContractController constructor.
	 *
	 * @param ActivateEmployee  $activateEmployee
	 * @param Area              $area
	 * @param Company           $company
	 * @param Contract          $contract
	 * @param DayTrip           $dayTrip
	 * @param Employee          $employee
	 * @param Log               $log
	 * @param NumHour           $numHour
	 * @param Periodicity       $periodicity
	 * @param Position          $position
	 * @param TermAndObligatory $termAndObligatory
	 * @param TypeContract      $typeContract
	 */
	public function __construct(ActivateEmployee $activateEmployee, Area $area, Company $company,
		Contract $contract, DayTrip $dayTrip, Employee $employee, Log $log, NumHour $numHour,
		Periodicity $periodicity, Position $position, TermAndObligatory $termAndObligatory,
		TypeContract $typeContract)
	{
		$this->activateEmployee  = $activateEmployee;
		$this->area              = $area;
		$this->company           = $company;
		$this->contract          = $contract;
		$this->dayTrip           = $dayTrip;
		$this->employee          = $employee;
		$this->log               = $log;
		$this->numHour           = $numHour;
		$this->periodicity       = $periodicity;
		$this->position          = $position;
		$this->termAndObligatory = $termAndObligatory;
		$this->typeContract      = $typeContract;
	}
	
	/**
	 * @return mixed for Bootstrap Table
	 */
	public function getContracts()
	{
		$contracts = $this->contract->with(['employee', 'company'])->get();
		
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
		$companies            = $this->company->enabled()->pluck('firm_name', 'id');
		$employees            = $this->employee->pluck('full_name', 'id');
		$positions            = $this->position->pluck('name', 'id');
		$areas                = $this->area->pluck('name', 'id');
		$numHours             = $this->numHour->pluck('name', 'id');
		$periodicities        = $this->periodicity->pluck('name', 'id');
		$dayTrips             = $this->dayTrip->pluck('name', 'id');
		$typeContracts        = $this->typeContract->pluck('full_name', 'id');
		$termsAndObligatories = $this->termAndObligatory->all();
		
		return view('human-resources.contracts.create', compact(
			'companies', 'employees', 'positions', 'areas', 'numHours', 'periodicities', 'dayTrips',
			'typeContracts', 'termsAndObligatories'
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
			$this->defineDateExpiredContract($request);
			$contract = $this->contract->create($request->all());
			$contract->termsAndObligatories()->attach($request->get('term_and_obligatory_id'));
			$this->activateEmployee->checkStateUpdateEmployee($request->get('employee_id'));
			session()->flash('success', 'El registro fue almacenado satisfactoriamente.');
			DB::commit();
			
			return response()->json(['status' => true, 'url' => '/human-resources/contracts']);
		} catch ( Exception $e )
		{
			$this->log->info("Error store Contract: " . $e->getMessage());
			DB::rollBack();
			
			return response()->json(['status' => false]);
		}
	}
	
	/**
	 * @param $request
	 *
	 * @return request with expired_at
	 */
	private function defineDateExpiredContract($request)
	{
		$typeContract = $this->typeContract->findOrFail($request->get('type_contract_id'));
		
		if ( $typeContract->name != 'Indefinido' )
		{
			return $request->request->add(['expires_at' => Carbon::now()->addMonths($typeContract->dur)]);
		}
		
		return $request->request->add(['expires_at' => Carbon::now()]);
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$contract = $this->contract->with([
			'company', 'employee', 'position', 'area', 'numHour', 'periodicity', 'dayTrip',
			'typeContract', 'termsAndObligatories'
		])->findOrFail($id);
		
		return view('human-resources.contracts.show', compact('contract'));
	}
	
	/**
	 * @param $id
	 *
	 * @return pdf generate in new tab
	 */
	public function getPdf($id)
	{
		$contract = $this->contract->with([
			'company.address.commune.province.region', 'employee.address.commune.province.region',
			'position', 'area', 'numHour', 'dayTrip', 'periodicityWork', 'typeContract',
			'termsAndObligatories', 'company.legalRepresentative', 'company.address.detailAddressCompany',
			'employee.address.detailAddressLegalEmployee'
		])->findOrFail($id);
		
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
