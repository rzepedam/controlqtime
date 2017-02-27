<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Controlqtime\Core\Api\Http\Request\EmployeeApiRequest;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Http\Controllers\Controller;
use Exception;
use Illuminate\Log\Writer as Log;

class EmployeeApiController extends Controller
{
    /**
     * @var Employee
     */
    protected $employee;

    /**
     * @var Log
     */
    protected $log;

    /**
     * EmployeeApiController constructor.
     *
     * @param Employee $employee
     * @param Log      $log
     */
    public function __construct(Employee $employee, Log $log)
    {
        $this->employee = $employee;
        $this->log = $log;
    }

    /**
     * @param EmployeeApiRequest $request
     *
     * @throws Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EmployeeApiRequest $request)
    {
        try {
            $employee = $this->employee->where('rut', $request->get('rut'))->firstOrFail();
            $employee->url = $request->get('url');
            $employee->save();
        } catch (Exception $e) {
            $this->log->error('Error Update Image Employee: '.$e->getMessage());

            return response()->json(['status' => false]);
        }

        return response()->json([
            'status' => true,
        ]);
    }
}
