<?php

namespace Controlqtime\Http\Controllers;

use Carbon\Carbon;
use Controlqtime\Core\Api\Entities\AccessControlApi;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Controlqtime\Core\Entities\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;

class DailyAssistanceController extends Controller
{
    /**
     * @var AccessControlApi
     */
    protected $accessControl;

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
     * @param AccessControlApi   $accessControl
     * @param DailyAssistanceApi $dailyAssistance
     * @param Employee           $employee
     * @param Log                $log
     */
    public function __construct(AccessControlApi $accessControl, DailyAssistanceApi $dailyAssistance,
        Employee $employee, Log $log)
    {
        $this->accessControl = $accessControl;
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
        $employees = $this->employee->enabled()->get();
        list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);

        return view('human-resources.daily-assistances.index', compact(
            'accessControls', 'dailyAssistances', 'num_employees', 'entry', 'output', 'employees'
        ));
    }

    /**
     * @param $date
     *
     * @return array
     */
    private function getRecordPerDate($date)
    {
        try {
            $accessControls = $this->accessControl->with(['employee'])->whereDate('created_at', $date)->get();
            $dailyAssistances = $this->dailyAssistance->with(['employee'])->whereDate('created_at', $date)->get();
            $num_employees = $accessControls->unique('rut');
            $entry = $accessControls->groupBy('rut')->transform(function ($item) {
                return $item->min('created_at');
            });

            return [$accessControls, $dailyAssistances, $num_employees, $entry];
        } catch (Exception $e) {
            $this->log->error('Error Get DailyAssistance: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
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
                list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDate($date);
                break;

            default:
                list($accessControls, $dailyAssistances, $num_employees, $entry) = $this->getRecordPerDateAndEmployee($employee, $date);
                break;
        }

        return response()->json([
            'accessControls'   => $accessControls,
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
        $accessControls = $this->accessControl->with(['employee'])->whereDate('created_at', $date)->where('employee_id', $employee)->get();
        $dailyAssistances = $this->dailyAssistance->with(['employee'])->whereDate('created_at', $date)->where('employee_id', $employee)->get();
        $num_employees = $accessControls->unique('rut');
        $entry = $accessControls->groupBy('rut')->transform(function ($item) {
            return $item->min('created_at');
        });

        return [$accessControls, $dailyAssistances, $num_employees, $entry];
    }
}
