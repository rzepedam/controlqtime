<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
use Yajra\Datatables\Datatables;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class DailyAssistanceController extends Controller
{
	/**
	 * @var Area
	 */
	protected $area;

	/**
	 * @var Company
	 */
	protected $company;

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
	 * @param Area $area
	 * @param Company $company
	 * @param DailyAssistanceApi $dailyAssistance
	 * @param Employee $employee
	 * @param Log $log
	 */
	public function __construct(Area $area, Company $company, DailyAssistanceApi $dailyAssistance, Employee $employee, Log $log)
	{
		$this->area            = $area;
		$this->company         = $company;
		$this->dailyAssistance = $dailyAssistance;
		$this->employee        = $employee;
		$this->log             = $log;
	}

	public function getAssistances()
	{
		$init = Carbon::parse(request('init') . ' 00:00:00')->format('Y-m-d H:i:s');
		$end  = Carbon::parse(request('end') . ' 23:59:59')->format('Y-m-d H:i:s');

		// assistances filter company, area and employee
		if ( ! is_null(request('company_id')) && ! is_null(request('area_id')) && ! is_null(request('employee_id')) )
		{
			$assistances = $this->getAssistanceFilterCompanyAndAreaAndEmployee(request('company_id'), request('area_id'), request('employee_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances filter company and area
		if ( ! is_null(request('company_id')) && ! is_null(request('area_id')) )
		{
			$assistances = $this->getAssistanceFilterCompanyAndArea(request('company_id'), request('area_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances filter company and employee
		if ( ! is_null(request('company_id')) && ! is_null(request('employee_id')) )
		{
			$assistances = $this->getAssistanceFilterCompanyAndEmployee(request('company_id'), request('employee_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances filter area and employee
		if ( ! is_null(request('area_id')) && ! is_null(request('employee_id')) )
		{
			$assistances = $this->getAssistanceFilterAreaAndEmployee(request('area_id'), request('employee_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances filter company
		if ( ! is_null(request('company_id')))
		{
			$assistances = $this->getAssistanceFilterCompany(request('company_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances filter employee
		if ( ! is_null(request('employee_id')) )
		{
			$assistances = $this->getAssistanceFilterEmployee(request('employee_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		// assistances employees filter per Area
		if ( ! is_null(request('area_id')))
		{
			$assistances = $this->getAssistanceFilterArea(request('area_id'), $init, $end);

			return Datatables::of($assistances)->make(true);
		}

		$assistances = $this->dailyAssistance
				->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
				->join('contracts', 'employees.id', 'contracts.employee_id')
				->join('companies', 'contracts.company_id', 'companies.id')
				->join('areas', 'contracts.area_id', 'areas.id')
				->whereBetween('daily_assistance_apis.log_in', [ $init, $end ])
				->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id AS company_id', 'companies.firm_name', 'areas.id AS area_id', 'areas.name')
				->get();

		return Datatables::of($assistances)->make(true);
	}

	/**
	 * Get assistances employee within date range
	 *
	 * @param $id 1
	 * @param $init 2017-06-22 00:00:00
	 * @param $end 2017-06-22 23:59:59
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterEmployee($id, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('daily_assistance_apis.employee_id', $id)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Company within date range
	 *
	 * @param $id
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterCompany($id, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('companies.id', $id)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Area within date range
	 *
	 * @param $id
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterArea($id, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('areas.id', $id)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Company and Area within date range
	 *
	 * @param $companyId
	 * @param $areaId
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterCompanyAndArea($companyId, $areaId, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('companies.id', $companyId)
			->where('areas.id', $areaId)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Company and Employee within date range
	 *
	 * @param $companyId
	 * @param $employeeId
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterCompanyAndEmployee($companyId, $employeeId, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('companies.id', $companyId)
			->where('employees.id', $employeeId)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Area and Employee within date range
	 *
	 * @param $areaId
	 * @param $employeeId
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterAreaAndEmployee($areaId, $employeeId, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('areas.id', $areaId)
			->where('employees.id', $employeeId)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.id', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Get assistance employees filter per Company, Area and Employee within date range
	 *
	 * @param $companyId
	 * @param $areaId
	 * @param $employeeId
	 * @param $init
	 * @param $end
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getAssistanceFilterCompanyAndAreaAndEmployee($companyId, $areaId, $employeeId, $init, $end)
	{
		return $this->dailyAssistance
			->join('employees', 'daily_assistance_apis.employee_id', 'employees.id')
			->join('contracts', 'employees.id', 'contracts.employee_id')
			->join('companies', 'contracts.company_id', 'companies.id')
			->join('areas', 'contracts.area_id', 'areas.id')
			->where('companies.id', $companyId)
			->where('areas.id', $areaId)
			->where('employees.id', $employeeId)
			->whereBetween('daily_assistance_apis.log_in', [$init, $end])
			->select('daily_assistance_apis.log_in', 'daily_assistance_apis.log_out', 'daily_assistance_apis.rut', 'daily_assistance_apis.employee_id', 'employees.full_name', 'companies.firm_name', 'areas.id', 'areas.name')
			->get();
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$companiesAux 	= $this->company->with(['areas', 'contracts.employee'])->get();
		$companies 		= $companiesAux->pluck('firm_name', 'id');
		$company 		= $companiesAux->first();
		$areas 			= $company->areas;
		$employees 		= $companiesAux->pluck('contracts')
										->collapse()
										->where('company_id', $company->id)
										->pluck('employee');
								
		return view('human-resources.daily-assistances.index', compact(
			'areas', 'companies', 'employees'
		));
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function loadCompany()
	{
		$company 	= $this->company->with(['contracts.employee', 'areas'])->where('id', request('company_id'))->get();
		$areas 		= $company->pluck('areas')->collapse()->pluck('name', 'id');
		$employees	= $company->pluck('contracts')
								->collapse()
								->pluck('employee')
								->pluck('full_name', 'id');

		return response()->json(['areas' => $areas, 'employees' => $employees]);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function loadArea()
	{
		$company = $this->company->with(['contracts.employee', 'areas'])
									->findOrFail(request('company_id'));

		// With area null, all employees
		if ( is_null(request('area_id')) )
		{
			$areas = $company->areas->pluck('name', 'id');

			return response()->json([
				'employees' => $company->contracts->pluck('employee')->pluck('full_name', 'id'),
				'areas' 	=> $areas
			]);
		}

		// Employees belongsTo area selected
		return response()->json([
			'employees' => $company->contracts->where('area_id', request('area_id'))->pluck('employee')->pluck('full_name', 'id')
		]);
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function loadEmployee()
	{
		if ( is_null(request('employee_id')) )
		{
			$areas = $this->company->with(['contracts.employee', 'areas'])
									->findOrFail(request('company_id'))
									->areas
									->pluck('name', 'id');

			return response()->json(['areas' => $areas]);
		}

		$area = $this->employee->with(['contract.area'])
								->where('id', request('employee_id'))
								->get()
								->pluck('contract')
								->pluck('area')
								->pluck('name', 'id');

		$employees = $this->area->with(['contracts.employee'])
								->findOrFail($area->keys())
								->pluck('contracts')
								->collapse()
								->where('company_id', request('company_id'))
								->pluck('employee')
								->pluck('full_name', 'id');

		return response()->json([
			'employees' => $employees, 'areas' => $area, 'selected' => request('employee_id')
		]);
	}
}
