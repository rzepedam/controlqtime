<?php

namespace Controlqtime\Core\Api\Http\Controllers;

use Carbon\Carbon;
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
	 * @param $date 2017-07-04 10:00:00
	 *
	 * @return int
	 */
	private function findPeriodToAssociateMark($date)
	{
		if ( $date >= '00:00:00' && $date <= '07:59:59' )
		{
			return 1;
		} elseif ( $date >= '08:00:00' && $date <= '15:59:59' )
		{
			return 2;
		} else
		{
			return 3;
		}
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
		$date = Carbon::parse(request('created_at'))->format('H:i:s');
		// Busca periodo al cual pertenece marca 1, 2, 3
		$period = $this->findPeriodToAssociateMark($date);
		request()->request->add(['period_every_eight_hour_id' => $period]);

		try {
			$employee = $this->employee->where('rut', request('rut'))->firstOrFail();
            switch (request('num_device'))
			{
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
