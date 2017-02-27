<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignInVisitTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function can_formatted_rut_sign_in_visit()
    {
        $signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'rut' => '17.032.680-6',
        ]);

        $this->assertEquals('17.032.680-6', $signInVisit->rut);
    }

    /** @test */
    public function can_formatted_birthday_sign_in_visit()
    {
        factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'birthday' => '09-09-1998',
        ]);

        $this->seeInDatabase('sign_in_visits', [
            'birthday' => '1998-09-09',
        ]);
    }

    /** @test */
    public function can_formatted_is_male_to_M_sign_in_visit()
    {
        $signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'is_male' => 'M',
        ]);

        $this->assertEquals(true, $signInVisit->is_male);
    }

    /** @test */
    public function can_formatted_is_male_to_F_sign_in_visit()
    {
        $signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'is_male' => 'F',
        ]);

        $this->assertEquals(false, $signInVisit->is_male);
    }

    /** @test */
    public function can_display_birthday_to_d_m_Y_format_sign_in_visit()
    {
        $signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'birthday' => '16-09-2005',
        ]);

        $this->assertEquals('16-09-2005', $signInVisit->birthday);
    }

    /** @test */
    public function can_display_birthday_to_spanish_format_sign_in_visit()
    {
        $signInVisit = factory(\Controlqtime\Core\Entities\SignInVisit::class)->create([
            'birthday' => '23-01-2017',
        ]);

        $this->assertEquals('lunes 23 enero 2017', $signInVisit->birthday_to_spanish_format);
    }
}
