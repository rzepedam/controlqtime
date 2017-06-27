<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Exception;
use Illuminate\Log\Writer as Log;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Http\Controllers\Controller;
use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;

class AccessControlApiController extends Controller
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
     * AccessControlApiController constructor.
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
     * @param AccessControlApiRequest $request
     *
     * @throws Exception
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AccessControlApiRequest $request)
    {
        try {
            $employee = $this->employee->where('rut', request('rut'))->firstOrFail();

            switch (request('num_device')) {
                case 'DDFF4EC6-182B-4E37-961D-28211D63E45B':
                    $employee->accessControls()->create($request->all());
                    break;

                case '06787B04-2454-4896-ACEB-D459610C4E61':
                    $employee->dailyAssistances()->create($request->all());
                    break;
            }

            return response()->json(['status' => true]);
        } catch (Exception $e) {
            $this->log->error('Error Store AccessControlApi: '.$e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
