<?php

namespace Controlqtime\Console\Commands;

use Carbon\Carbon;
use Controlqtime\Mail\Assistance\Weekly;
use Illuminate\Console\Command;
use Controlqtime\Notifications\Test;
use Illuminate\Support\Facades\Mail;
use Controlqtime\Core\Entities\Employee;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class EmailWithWeeklyAssistance extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:email-with-weekly-assistance';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * @var Employee
	 */
	protected $employee;

	/**
	 * @var DailyAssistanceApi
	 */
	protected $assistance;

	/**
	 * Create a new command instance.
	 *
	 * @param DailyAssistanceApi $assistance
	 * @param Employee           $employee
	 */
	public function __construct(DailyAssistanceApi $assistance, Employee $employee)
	{
		parent::__construct();
		$this->assistance = $assistance;
		$this->employee   = $employee;
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		$init      = Carbon::now()->startOfWeek()->toDateString() . ' 00:00:00';
		$end       = Carbon::now()->startOfWeek()->addDays(3)->toDateString() . ' 23:59:59';
		$employees = $this->employee->with([
			'contract.company.address.detailAddressCompany', 'contract.company.address.commune.province.region'
		])->get();

		$assistancesAux = $this->assistance
			->whereBetween('created_at', [ $init, $end ])
			->orderBy('created_at')
			->get();

		foreach ( $employees as $employee )
		{
			$assistances = $assistancesAux
				->where('employee_id', $employee->id)
				->values()
				->groupBy(function ($item, $key) {
					return Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->format('d-m');
				});
			$message = (new Weekly($assistances, $employee, $init, $end))->onQueue('emails');
			dd($employee->email_employee);
			Mail::to($employee->email_employee)->queue($message);
			break;
		}
	}
}
