<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RemunerationIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $contract;

    protected $familyResponsability;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();

        $this->contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
            'employee_id' => $this->employee->id,
        ]);

        $this->familyResponsability = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
            'employee_id' => $this->employee->id,
        ]);
    }

    /** @test */
    public function index_remuneration()
    {
        $this->visit('human-resources/remunerations')
            ->seeInElement('h1', 'Remuneraciones')
            ->seeInElement('#employee_id', $this->employee->fullName)
            ->seeInElement('.well', $this->employee->days_worked_in_the_month)
            ->seeInElement('.well', $this->employee->days_delays_in_the_month)
            ->seeInElement('.well', $this->employee->days_non_assistance_in_the_month)
            ->seeInElement('.well', $this->employee->days_extra_hours_in_the_month)
            ->seeInElement('td', 'Sueldo Base')
            ->seeInElement('td', $this->employee->contract->sueldo_base)
            ->seeInElement('td', 'Gratificación')
            ->seeInElement('td', $this->employee->contract->gratification)
            ->seeInElement('td', 'Horas Extras')
            ->seeInElement('td', $this->employee->contract->horas_extra)
            ->seeInElement('td', 'Comisión')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Bono Imponible')
            ->seeInElement('td', '0')
            ->seeInElement('td', $this->employee->contract->bono_no_imponible)
            ->seeInElement('td', 'Inasistencias')
            ->seeInElement('td', 'Atrasos')
            ->seeInElement('td', 'Total Asistencia y Atrasos')
            ->seeInElement('td', 'Total Imponible')
            ->seeInElement('td', $this->employee->contract->total_imponible)
            ->seeInElement('td', 'Cargas Familiares')
            ->seeInElement('td', $this->employee->contract->asignacion_familiar)
            ->seeInElement('td', 'Locomoción')
            ->seeInElement('td', $this->employee->contract->mobilization_money_field)
            ->seeInElement('td', 'Colación')
            ->seeInElement('td', $this->employee->contract->collation_money_field)
            ->seeInElement('td', 'Bono No Imponible')
            ->seeInElement('td', 'Total Haber')
            ->seeInElement('td', $this->employee->contract->total_haber)
            ->seeInElement('td', 'AFP')
            ->seeInElement('td', $this->employee->contract->total_pension)
            ->seeInElement('td', 'APV')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Seguro Cesantía')
            ->seeInElement('td', $this->employee->contract->seguro_cesantia)
            ->seeInElement('td', 'Salud')
            ->seeInElement('td', $this->employee->contract->total_forecast)
            ->seeInElement('td', 'Cotización Adicional Isapre')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Valor Plan')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Descuentos Afectos')
            ->seeInElement('td', $this->employee->contract->descuentos_afectos)
            ->seeInElement('td', 'Base Tributable')
            ->seeInElement('td', $this->employee->contract->base_tributable)
            ->seeInElement('td', 'Impuesto')
            ->seeInElement('td', $this->employee->contract->valor_impuesto_segunda_categoria)
            ->seeInElement('td', 'Rebaja')
            ->seeInElement('td', $this->employee->contract->rebaja_impuesto)
            ->seeInElement('td', 'Impuesto Único')
            ->seeInElement('td', $this->employee->contract->impuesto_unico)
            ->seeInElement('td', 'Descuentos Varios')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Total Descuentos')
            ->seeInElement('td', $this->employee->contract->total_descuentos)
            ->seeInElement('td', 'Anticipos')
            ->seeInElement('td', '0')
            ->seeInElement('td', 'Sueldo Líquido')
            ->seeInElement('td', $this->employee->contract->sueldo_liquido);

        /*
         * @todo unit tests to $this->employee->contract->salary, $this->employee->contract->gratification()
         * @todo unit tests to $employee->familyAllowance()
         */
    }
}
