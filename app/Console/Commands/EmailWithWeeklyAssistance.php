<?php

namespace Controlqtime\Console\Commands;

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
        $user = User::findOrFail(1);

        Mail::to($user)->send(new TestEmail());
    }
}
