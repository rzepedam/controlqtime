<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MasterFormPieceVehicleIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
    function test_url_master_form_piece_vehicle()
    {
        $this->visit('operations/master-form-piece-vehicles')
	        ->assertResponseOk();
    }
	
	function test_route_master_form_piece_vehicle()
	{
		$this->visitRoute('master-form-piece-vehicles.index')
			->assertResponseOk();
	}
	
	function test_index_master_form_piece_vehicle()
	{
		$this->visit('operations/master-form-piece-vehicles')
			->seeInElement('h1', 'Listado de Maestros Formulario Pieza Vehículos')
			->seeInElement('a', 'Crear Nuevo Maestro Formulario Pieza Vehículos')
			->seeInElement('th', 'Id')
			->seeInElement('th', 'Nombre')
			->seeInElement('a', 'Volver');
	}
}
