<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Entities\Area;
use Controlqtime\Core\Entities\Company;
use Controlqtime\Core\Entities\Employee;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;

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
     * @param Area               $area
     * @param AccessControlApi   $accessControl
     * @param Company            $company
     * @param DailyAssistanceApi $dailyAssistance
     * @param Employee           $employee
     * @param Log                $log
     */
    public function __construct(Area $area, Company $company, DailyAssistanceApi $dailyAssistance, Employee $employee, Log $log)
    {
        $this->area = $area;
        $this->company = $company;
        $this->dailyAssistance = $dailyAssistance;
        $this->employee = $employee;
        $this->log = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::today();
        $areas = $this->area->get();
        $companies = $this->company->get();
        $employees = $this->employee->enabled()->get();
        $dailyAssistances = $this->dailyAssistance->with(['employee'])->whereDate('created_at', $date)->get();

        return view('human-resources.daily-assistances.index', compact(
            'areas', 'companies', 'dailyAssistances', 'employees'
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
        $employee = $request->get('employee');

        switch ($employee) {
            case '*':
                list($dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);
                break;

            default:
                list($dailyAssistances, $num_employees, $entry) = $this->getRecordPerDateAndEmployee($employee, $date);
                break;
        }

        return response()->json([
            'dailyAssistances' => $dailyAssistances,
            'num_employees'    => $num_employees,
            'entry'            => $entry,
            'success'          => true,
        ], 200);
    }

    /**
     * @param $employee
     * @param $date
     *
     * @return array
     */
    private function getRecordPerDateAndEmployee($employee, $date)
    {
        $dailyAssistances = $this->dailyAssistance->with(['employee'])->whereDate('created_at', $date)->where('employee_id', $employee)->get();
        $num_employees = $accessControls->unique('rut');
        $entry = $accessControls->groupBy('rut')->transform(function ($item) {
            return $item->min('created_at');
        });

        return [$dailyAssistances, $num_employees, $entry];
    }
}
