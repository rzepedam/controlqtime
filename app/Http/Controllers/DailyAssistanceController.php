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

			// Assistance filter company, area and employee
			if ( ! is_null(request('company_id')) && ! is_null(request('area_id')) && ! is_null(request('employee_id')) )
			{
				$assistances = $this->getAssistanceFilterCompanyAndAreaAndEmployee(request('company_id'), request('area_id'), request('employee_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance filter company and area
			if ( ! is_null(request('company_id')) && ! is_null(request('area_id')) )
			{
				$assistances = $this->getAssistanceFilterCompanyAndArea(request('company_id'), request('area_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance filter company and employee
			if ( ! is_null(request('company_id')) && ! is_null(request('employee_id')) )
			{
				$assistances = $this->getAssistanceFilterCompanyAndEmployee(request('company_id'), request('employee_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance filter area and employee
			if ( ! is_null(request('area_id')) && ! is_null(request('employee_id')) )
			{
				$assistances = $this->getAssistanceFilterAreaAndEmployee(request('area_id'), request('employee_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance filter company
			if ( ! is_null(request('company_id')))
			{
				$assistances = $this->getAssistanceFilterCompany(request('company_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance filter employee
			if ( ! is_null(request('employee_id')) )
			{
				$assistances = $this->getAssistanceFilterEmployee(request('employee_id'), $init, $end);

				return Datatables::of($assistances)->make(true);
			}

			// Assistance employees filter per Area
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
								->whereBetween('daily_assistance_apis.created_at', [ $init, $end ])
								->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
						->whereBetween('daily_assistance_apis.created_at', [$init, $end])
						->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
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
				->where('companies.id', $areaId)
				->where('areas.id', $areaId)
				->where('employees.id', $employeeId)
				->whereBetween('daily_assistance_apis.created_at', [$init, $end])
				->select('daily_assistance_apis.created_at', 'daily_assistance_apis.rut', 'employees.full_name', 'companies.firm_name', 'areas.name')
				->get();
		}

		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index()
		{
			$areas     = $this->area->get();
			$companies = $this->company->get();
			$employees = $this->employee->enabled()->get();

			return view('human-resources.daily-assistances.index', compact('areas', 'companies', 'dailyAssistances', 'employees'));
		}
	}
