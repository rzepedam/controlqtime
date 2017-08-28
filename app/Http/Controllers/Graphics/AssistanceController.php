<?php

namespace Controlqtime\Http\Controllers\Graphics;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Entities\PeriodEveryEightHour;

class AssistanceController extends Controller
{
	/**
	 * @var Company
	 */
	protected $company;

	/**
	 * @var Area
	 */
	protected $area;

	/**
	 * @var PeriodEveryEightHour
	 */
	protected $periodEveryEightHour;

	/**
	 * AssistanceController constructor.
	 *
	 * @param Area                 $area
	 * @param Company              $company
	 * @param PeriodEveryEightHour $periodEveryEightHour
	 */
	public function __construct(Area $area, Company $company, PeriodEveryEightHour $periodEveryEightHour)
	{
		$this->area                 = $area;
		$this->company              = $company;
		$this->periodEveryEightHour = $periodEveryEightHour;
	}

	/**
	 * @param $companyId 1
	 * @param $init '2017-07-03 00:00:00'
	 * @param $end '2017-07-03 23:59:59'
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getMarksCompany($companyId, $init, $end)
	{
		return collect(DB::select(
			" SELECT period_every_eight_hours.id, COUNT(daily_assistance_apis.id) AS marks" .
			" FROM period_every_eight_hours" .
			" LEFT JOIN daily_assistance_apis" .
			" JOIN employees ON daily_assistance_apis.employee_id = employees.id" .
			" JOIN contracts ON employees.id = contracts.employee_id" .
			" JOIN companies ON contracts.company_id = companies.id" .
			" ON daily_assistance_apis.log_in" .
			" BETWEEN CONCAT(?, ' ', period_every_eight_hours.begin) " .
			" AND CONCAT(?,' ', period_every_eight_hours.end)" .
			" AND period_every_eight_hours.id = daily_assistance_apis.period_every_eight_hour_id" .
			" AND companies.id = ?" .
			" GROUP BY period_every_eight_hours.id", [ $init, $end, $companyId ]
		))->pluck('marks');
	}

	/**
	 * @param $companyId 1
	 * @param $areaId 1
	 * @param $init '2017-07-03 00:00:00'
	 * @param $end '2017-07-03 23:59:59'
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function getMarksArea($companyId, $areaId, $init, $end)
	{
		return collect(DB::select(
			" SELECT period_every_eight_hours.id, COUNT(daily_assistance_apis.id) AS marks" .
			" FROM period_every_eight_hours" .
			" LEFT JOIN daily_assistance_apis" .
			" JOIN employees ON daily_assistance_apis.employee_id = employees.id" .
			" JOIN contracts ON employees.id = contracts.employee_id" .
			" JOIN companies ON contracts.company_id = companies.id" .
			" JOIN areas ON contracts.area_id = areas.id" .
			" ON daily_assistance_apis.log_in" .
			" BETWEEN CONCAT(?, ' ', period_every_eight_hours.begin) " .
			" AND CONCAT(?,' ', period_every_eight_hours.end)" .
			" AND companies.id = ?" .
			" AND areas.id = ?" .
			" AND period_every_eight_hours.id = daily_assistance_apis.period_every_eight_hour_id" .
			" GROUP BY period_every_eight_hours.id", [ $init, $end, $companyId, $areaId ]
		))->pluck('marks');
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function changeDateInput()
	{
		$companyId = request('company_id');
		$areaId    = request('area_id');
		$init      = Carbon::parse(request('init') . ' 00:00:00')->format('Y-m-d H:i:s');
		$end       = Carbon::parse(request('end') . ' 23:59:59')->format('Y-m-d H:i:s');

		// Gets marks company and areas
		$marksCompany     = $this->getMarksCompany($companyId, $init, $end);
		$marksArea        = $this->getMarksArea($companyId, $areaId, $init, $end);
		$marksTypeCompany = $this->getMarksTypeCompany($init, $end)->values();

		return response()->json([ 'area' => $marksArea, 'company' => $marksCompany, 'typeCompany' => $marksTypeCompany ]);
	}

	/**
	 * @param $companyId
	 * @param $areaId
	 * @param $init
	 * @param $end
	 *
	 * @return array
	 */
	public function changeCompanySelect($companyId = null, $areaId = null, $init = null, $end = null)
	{
		$companyId = is_null($companyId) ? request('company_id') : $companyId;
		$areas     = is_null($areaId) ? $this->company->findOrFail(request('company_id'))->areas->pluck('id', 'name') : null;
		$areaId    = is_null($areaId) ? $areas->first() : $areaId;
		$init      = is_null($init) ? Carbon::parse(request('init') . ' 00:00:00')->format('Y-m-d H:i:s') : $init;
		$end       = is_null($end) ? Carbon::parse(request('end') . ' 23:59:59')->format('Y-m-d H:i:s') : $end;

		// Gets marks company and areas
		$marksCompany = $this->getMarksCompany($companyId, $init, $end);
		$marksArea    = $this->getMarksArea($companyId, $areaId, $init, $end);

		if ( is_null($areas) )
		{
			return response()->json([ 'area' => $marksArea, 'company' => $marksCompany ]);
		}

		return response()->json([ 'area' => $marksArea, 'company' => $marksCompany, 'areas' => $areas ]);
	}

	/**
	 * @param $companyId
	 * @param $areaId
	 * @param $init
	 * @param $end
	 *
	 * @return array
	 */
	public function changeAreaSelect($companyId = null, $areaId = null, $init = null, $end = null)
	{
		$companyId = is_null($companyId) ? request('company_id') : $companyId;
		$areaId    = is_null($areaId) ? request('area_id') : $areaId;
		$init      = is_null($init) ? Carbon::parse(request('init'))->format('Y-m-d') : $init;
		$end       = is_null($end) ? Carbon::parse(request('end'))->format('Y-m-d') : $end;
		$marksArea = $this->getMarksArea($companyId, $areaId, $init, $end);

		return response()->json([ 'area' => $marksArea ]);
	}

	/**
	 * @param null $init
	 * @param null $end
	 *
	 * @return static
	 */
	public function getMarksTypeCompany($init = null, $end = null)
	{
		$init = is_null($init) ? Carbon::parse(request('init'))->format('Y-m-d') : $init;
		$end  = is_null($end) ? Carbon::parse(request('end'))->format('Y-m-d') : $end;

		$marksTypeCompany = collect(DB::select(
			" SELECT type_companies.name, COUNT(daily_assistance_apis.id) AS marks" .
			" FROM daily_assistance_apis" .
			" JOIN employees ON daily_assistance_apis.employee_id = employees.id" .
			" JOIN contracts ON employees.id = contracts.employee_id" .
			" JOIN companies ON contracts.company_id = companies.id" .
			" JOIN type_companies ON companies.type_company_id = type_companies.id" .
			" WHERE daily_assistance_apis.log_in" .
			" BETWEEN ?" .
			" AND ?" .
			" GROUP BY type_companies.name", [ $init, $end ]
		))->pluck('marks', 'name');
		
		return $marksTypeCompany;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$companies        = $this->company->get([ 'id', 'firm_name' ]);
		$companyId        = $companies->first()->id;
		$areas            = $this->company->findOrFail($companyId)->areas;
		$areaId           = $areas->first()->id;
		$init             = Carbon::now()->format('Y-m-d') . ' 00:00:00';
		$end              = Carbon::now()->format('Y-m-d') . ' 23:59:59';
		$marks            = $this->changeCompanySelect($companyId, $areaId, $init, $end);
		$marksTypeCompany = collect($this->getMarksTypeCompany($init, $end));
		$marksCompany     = collect($marks->getData()->company);
		$marksArea        = collect($marks->getData()->area);

		return view('graphics.assistance', compact(
			'companies', 'areas', 'marksCompany', 'marksArea', 'marksTypeCompany'
		));
	}
}
