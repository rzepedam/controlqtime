<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class SignInVisitCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function create_sign_in_visit()
	{
		$this->visit('visits/sign-in-visits/create')
			->seeInElement('h1', 'Crear Nuevo Registro Visita')
			->see('Apellido Paterno')
			->see('Apellido Materno')
			->see('Primer Nombre')
			->see('Segundo Nombre')
			->see('Rut')
			->see('Fecha Nacimiento')
			->see('Sexo')
			->see('M')
			->see('F')
			->see('Celular')
			->see('Email')
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Guardar');
	}
	
	/** @test */
	function store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->seeInDatabase('sign_in_visits', [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17032680-6',
			'birthday'       => '1989-06-11',
			'is_male'        => true,
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		]);
	}
	
	/** @test */
	function male_surname_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => '',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('male_surname', $this->decodeResponseJson());
	}
	
	/** @test */
	function male_surname_it_is_max_30_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'male-surname-with-more-than-30-letters-in-length',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('male_surname', $this->decodeResponseJson());
	}
	
	/** @test */
	function female_surname_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => '',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('female_surname', $this->decodeResponseJson());
	}
	
	/** @test */
	function female_surname_it_is_max_30_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'female-surname-with-more-than-30-letters-in-length',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('female_surname', $this->decodeResponseJson());
	}
	
	/** @test */
	function first_name_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => '',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('first_name', $this->decodeResponseJson());
	}
	
	/** @test */
	function first_name_it_is_max_30_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'first-name-with-more-than-30-letters-in-length',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('first_name', $this->decodeResponseJson());
	}
	
	/** @test */
	function rut_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('rut', $this->decodeResponseJson());
	}
	
	/** @test */
	function rut_it_is_max_12_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => 'rut-with-more-than-12-letters-in-length',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('rut', $this->decodeResponseJson());
	}
	
	/** @test */
	function birthday_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('birthday', $this->decodeResponseJson());
	}
	
	/** @test */
	function birthday_is_an_invalid_date_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '1989-01-01',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('birthday', $this->decodeResponseJson());
	}
	
	/** @test */
	function is_male_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => '',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('is_male', $this->decodeResponseJson());
	}
	
	/** @test */
	function is_male_contain_a_different_value_than_M_or_F_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'Q',
			'phone'          => '+56974155784',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('is_male', $this->decodeResponseJson());
	}
	
	/** @test */
	function phone_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('phone', $this->decodeResponseJson());
	}
	
	/** @test */
	function phone_it_is_max_12_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => 'phone-with-more-than-12-letters-in-length',
			'email'          => 'raulmeza@controlqtime.cl'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('phone', $this->decodeResponseJson());
	}
	
	/** @test */
	function email_is_required_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => ''
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('email', $this->decodeResponseJson());
	}
	
	/** @test */
	function email_must_be_valid_to_store_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'non-valid-email'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('email', $this->decodeResponseJson());
	}
	
	/** @test */
	function email_it_is_max_60_letters_in_length_sign_in_visit()
	{
		$data = [
			'male_surname'   => 'Meza',
			'female_surname' => 'Mora',
			'first_name'     => 'Raúl',
			'second_name'    => 'Elías',
			'rut'            => '17.032.680-6',
			'birthday'       => '11-06-1989',
			'is_male'        => 'M',
			'phone'          => '+56974155784',
			'email'          => 'email_address_with_more_than_60_letters_in_length_more@gmail.com'
		];
		
		$this->json('POST', 'visits/sign-in-visits', $data);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('email', $this->decodeResponseJson());
	}
}
