<?php

namespace Controlqtime\Console\Commands;

use Controlqtime\Mail\SignUp;
use Illuminate\Console\Command;
use Controlqtime\Notifications\Assistance\WeeklyAssistance;
use Illuminate\Support\Facades\Mail;

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
        $user = \Controlqtime\Core\Entities\User::findOrFail(1);
        dd($user);
	    Mail::to($user)->send(new SignUp($password, $user));   // Sending email with credentials...
    }
}
