<?php

namespace Controlqtime\Console\Commands;

use Illuminate\Console\Command;
use Controlqtime\Notifications\Assistance\WeeklyAssistance;

class SendEmailWeeklyAssistance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-weekly-assistance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to employee with weekly sum assistance';

    /**
     * Create a new command instance.
     *
     * @return void
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
        $assistances = Assistance::all();

	    Notification::send($assistances, new WeeklyAssistance());
    }
}
