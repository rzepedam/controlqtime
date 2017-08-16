<?php

namespace Controlqtime\Console\Commands;

use Carbon\Carbon;
use Controlqtime\Core\Entities\User;
use Illuminate\Console\Command;
use Controlqtime\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;

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
	 * Create a new command instance.
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		// $init = Carbon::now()->startOfWeek()->toDateString();
		// $end  = Carbon::now()->startOfWeek()->addDays(4)->toDateString() . ' 23:59:59';

		$date = \Carbon\Carbon::parse('2017-08-10 00:00:00');
		$init = $date->toDateString() . ' 00:00:00';
		$end  = $date->addDays(4)->toDateString() . ' 23:59:59';

		$employees = $this->employee->all();

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
					return $item->created_at->format('d-m');
				});

			Mail::to($employee->email_employee)->send(new TestEmail($assistances, $employee));
			break;
		}

		Mail::to($user)->send(new TestEmail());
	}
}
