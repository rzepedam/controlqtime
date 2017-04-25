<?php

	use Carbon\Carbon;
	use Illuminate\Foundation\Testing\DatabaseTransactions;

	class VisitTest extends BrowserKitTestCase
	{
		use DatabaseTransactions;

		public function setUp()
		{
			parent::setUp();
			$this->signIn();
		}

		/** @test */
		public function can_formatted_is_walking_to_true_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'is_walking' => '1' ]);

			$this->assertEquals(true, $visit->getOriginal('is_walking'));
		}

		/** @test */
		public function can_formatted_is_walking_to_false_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'is_walking' => '0' ]);

			$this->assertEquals(false, $visit->getOriginal('is_walking'));
		}

		/** @test */
		public function can_formatted_rut_not_dots_or_dash_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'rut' => '17.032.680-6' ]);

			$this->assertEquals('17032680-6', $visit->getOriginal('rut'));
		}

		/** @test */
		public function can_formatted_male_surname_to_capitalize_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'male_surname' => 'martínez' ]);

			$this->assertEquals('Martínez', $visit->getOriginal('male_surname'));
		}

		/** @test */
		public function can_formatted_female_surname_to_capitalize_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'female_surname' => 'cancino' ]);

			$this->assertEquals('Cancino', $visit->getOriginal('female_surname'));
		}

		/** @test */
		public function can_formatted_first_name_to_capitalize_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'first_name' => 'claudio' ]);

			$this->assertEquals('Claudio', $visit->getOriginal('first_name'));
		}

		/** @test */
		public function can_formatted_second_name_to_capitalize_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'second_name' => 'alfonso' ]);

			$this->assertEquals('Alfonso', $visit->getOriginal('second_name'));
		}

		/** @test */
		public function can_formatted_position_to_capitalize_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'position' => 'conductor' ]);

			$this->assertEquals('Conductor', $visit->getOriginal('position'));
		}

		/** @test */
		public function can_formatted_company_to_ucfirst_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'company' => 'los Aromos S.A.' ]);

			$this->assertEquals('Los Aromos S.A.', $visit->getOriginal('company'));
		}

		/** @test */
		public function can_formatted_email_to_strtolower_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'email' => 'Nvg.AmeRica@gmail.com' ]);

			$this->assertEquals('nvg.america@gmail.com', $visit->getOriginal('email'));
		}

		/** @test */
		public function can_formatted_date_to_Ymd_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'date' => '23-03-2017' ]);

			$this->seeInDatabase('visits', [
				'id'   => $visit->id,
				'date' => '2017-03-23'
			]);
		}

		/** @test */
		public function can_formatted_hour_to_string_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'hour' => '12:00' ]);

			$this->assertEquals('1200', $visit->getOriginal('hour'));
		}

		/** @test */
		public function can_formatted_start_date_to_Ymd_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'start_date' => '23-04-2017' ]);

			$this->seeInDatabase('visits', [
				'id'         => $visit->id,
				'start_date' => '2017-04-23'
			]);
		}

		/** @test */
		public function can_formatted_end_date_to_Ymd_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'end_date' => '01-05-2017' ]);

			$this->seeInDatabase('visits', [
				'id'       => $visit->id,
				'end_date' => '2017-05-01'
			]);
		}

		/** @test */
		public function can_formatted_obs_to_ucfirst_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([ 'obs' => 'lorem ipsum Cred...' ]);

			$this->assertEquals('Lorem ipsum Cred...', $visit->obs);
		}

		/** @test */
		public function can_generate_url_with_expired_date_visit()
		{
			$visit = factory(\Controlqtime\Core\Entities\Visit::class)->create([
				'date' => '16-03-2017',
				'hour' => '15:30'
			]);

			$date      = Carbon::parse($visit->date->format('Y-m-d') . ' ' . $visit->hour)->timestamp;
			$timestamp = explode('=', $visit->url);
			$expired   = explode('&', $timestamp[1]);

			$this->assertEquals($date, $expired[0]);
		}
	}
