<?php

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DailyAssistanceIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_daily_assistance()
    {
        $this->visit('human-resources/daily-assistances')
            ->assertResponseOk();
    }

    public function test_route_daily_assistance()
    {
        $this->visitRoute('daily-assistances.index')
            ->assertResponseOk();
    }

    public function test_index_daily_assistance()
    {
        $this->visit('human-resources/daily-assistances')
            ->seeInField('#date', Carbon::today()->format('d-m-Y'))
            ->seeInElement('#employee_id', 'Ver Todos');
    }
}
