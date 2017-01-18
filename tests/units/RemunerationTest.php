<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RemunerationTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function can_formatted_salary_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 356900
		]);
		
		$this->assertEquals('356.900', $contract->sueldo_base);
	}
	
	/** @test */
	function can_formatted_gratification_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 356900
		]);
		
		$this->assertEquals('101.927', $contract->gratification);
	}
	
	/** @test */
	function can_formatted_total_imponible_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 791000
		]);
		
		$this->assertEquals('892.927', $contract->total_imponible);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_first_segment_without_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 255000
		]);
		
		$this->assertEquals('0', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_first_segment_with_a_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 255000
		]);
		
		$familyResponsability = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$this->assertEquals('10.577', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_first_segment_with_two_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 255000
		]);
		
		$familyResponsability1 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$familyResponsability2 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$this->assertEquals('21.154', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_second_segment_without_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 335000
		]);
		
		$this->assertEquals('0', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_second_segment_with_two_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 335000
		]);
		
		$familyResponsability1 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$familyResponsability2 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$this->assertEquals('12.982', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_third_segment_without_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 570000
		]);
		
		$this->assertEquals('0', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_asignacion_familiar_in_third_segment_with_two_family_responsability_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 570000
		]);
		
		$familyResponsability1 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$familyResponsability2 = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$this->assertEquals('4.104', $contract->asignacion_familiar);
	}
	
	/** @test */
	function can_formatted_mobilization_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'mobilization' => 35000
		]);
		
		$this->assertEquals('35.000', $contract->mobilization_money_field);
	}
	
	/** @test */
	function can_formatted_collation_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'collation' => 27000
		]);
		
		$this->assertEquals('27.000', $contract->collation_money_field);
	}
	
	/** @test */
	function can_formatted_bono_no_imponible_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'mobilization' => 50000,
			'collation'    => 50000
		]);
		
		$this->assertEquals('100.000', $contract->bono_no_imponible);
	}
	
	/** @test */
	function can_formatted_seguro_cesantia_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 1000000
		]);
		
		$this->assertEquals('6.612', $contract->seguro_cesantia);
	}
	
	/** @test */
	function can_formatted_total_haber_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'       => 1000000,
			'mobilization' => 50000,
			'collation'    => 50000
		]);
		
		$this->assertEquals('1.201.927', $contract->total_haber);
	}
	
	/** @test */
	function can_formatted_total_haber_with_family_responsabilities_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'       => 255000,
			'mobilization' => 35000,
			'collation'    => 35000
		]);
		
		$familyResponsability = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $contract->employee->id
		]);
		
		$this->assertEquals('437.504', $contract->total_haber);
	}
	
	/** @test */
	function can_formatted_total_pension_with_capital_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0144'])->id
		]);
		
		$this->assertEquals('126.060', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_pension_with_cuprum_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0148'])->id
		]);
		
		$this->assertEquals('126.501', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_pension_with_habitat_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0127'])->id
		]);
		
		$this->assertEquals('124.187', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_pension_with_modelo_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('118.678', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_pension_with_plan_vital_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0041'])->id
		]);
		
		$this->assertEquals('114.711', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_pension_with_provida_afp_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0154'])->id
		]);
		
		$this->assertEquals('127.162', $contract->total_pension);
	}
	
	/** @test */
	function can_formatted_total_forecast_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 870000
		]);
		
		$this->assertEquals('68.035', $contract->total_forecast);
	}
	
	/** @test */
	function can_formatted_descuentos_afectos_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('202.424', $contract->descuentos_afectos);
	}
	
	/** @test */
	function can_formatted_base_tributable_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('899.503', $contract->base_tributable);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_first_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 550000,
		]);
		
		$this->assertEquals('0', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_second_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1190000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('42.184', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_third_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1800000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('124.203', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_fourth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 2500000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('286.734', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_fifth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 4000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('770.133', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_sixth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 4850000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('1.228.846', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_valor_impuesto_segunda_categoria_for_seventh_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 11500000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('3.314.729', $contract->valor_impuesto_segunda_categoria);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_first_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 550000,
		]);
		
		$this->assertEquals('0', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_second_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 1190000,
		]);
		
		$this->assertEquals('24.275', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_third_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 1800000,
		]);
		
		$this->assertEquals('78.221', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_fourth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 2500000,
		]);
		
		$this->assertEquals('201.847', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_fifth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 4000000,
		]);
		
		$this->assertEquals('500.798', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_sixth_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 4850000,
		]);
		
		$this->assertEquals('800.199', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_rebaja_impuesto_for_seventh_segment_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary' => 11500000,
		]);
		
		$this->assertEquals('1.075.323', $contract->rebaja_impuesto);
	}
	
	/** @test */
	function can_formatted_impuesto_unico_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('11.705', $contract->impuesto_unico);
	}
	
	/** @test */
	function can_formatted_total_descuentos_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'     => 1000000,
			'pension_id' => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id
		]);
		
		$this->assertEquals('214.129', $contract->total_descuentos);
	}
	
	/** @test */
	function can_formatted_sueldo_liquido_to_money_field()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'salary'       => 1000000,
			'pension_id'   => factory(\Controlqtime\Core\Entities\Pension::class)->create(['com' => '0.0077'])->id,
			'mobilization' => 50000,
			'collation'    => 50000
		]);
		
		$this->assertEquals('987.798', $contract->sueldo_liquido);
	}
}
