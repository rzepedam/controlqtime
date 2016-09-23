<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CheckVehicleFormTest extends TestCase
{
	public function test_check_form_vehicle_index()
	{
		$this->visit('operations/check-vehicle-forms')
			->see('Listado Formulario Chequeo Vehículos')
			->see('ID')
			->see('Modelo')
			->see('Marca')
			->see('Patente')
			->see('Ingresado')
			->see('Acciones');
	}
	
	public function test_check_form_vehicle_create()
	{
		$this->visit('operations/check-vehicle-forms')
			->click('Crear Nuevo Formulario Chequeo Vehículo')
			->assertResponseStatus(200);
	}
	
}
