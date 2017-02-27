<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Controlqtime\Core\Api\Http\Request\AccessControlApiRequest;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Http\Controllers\Controller;
use Exception;
use Illuminate\Log\Writer as Log;

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
                case 'CE9D8A76-AD2C-40A0-9A61-007259F42CBA':
                    $employee->accessControls()->create($request->all());
                    break;

                case '187783A1-7985-4839-B8C1-2F0ACC290E13':
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
