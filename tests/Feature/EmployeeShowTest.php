<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeShowTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    public function show_employee()
    {
        $this->visit('human-resources/employees/'.$this->employee->id)
            ->seeInElement('h1', 'Detalle Trabajador: <span class="text-primary">'.$this->employee->id.'</span>')
            ->seeInElement('a', 'Información Personal')
            ->seeInElement('a', 'Competencias Laborales')
            ->seeInElement('a', 'Información de Salud')
            ->seeInElement('a', 'Documentos Adjuntos <span class="badge badge-warning up">'.$this->employee->num_total_images.'</span>')
            ->seeInElement('td', 'Raúl Elías Meza Mora')
            ->seeInElement('td', 'raulmeza@controlqtime.cl')
            ->seeInElement('td', '+56974155784')
            ->seeInElement('td', 'Chile')
            ->see('https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg')
            ->seeInElement('td', '17.032.680-6')
            ->seeInElement('td', '27 años')
            ->seeInElement('td', 'Domingo 11 Junio 1989')
            ->seeInElement('td', 'Masculino')
            ->seeInElement('td', 'Soltero')
            ->seeInElement('td', 'Santa Amalia 273, Depto 303. La Florida. Santiago. Región Metropolitana de Santiago')
            ->seeInElement('td', '222624050')
            ->seeInElement('td', 'Lunes 12 Diciembre 2016 09:13:21')
            ->seeInElement('td', 'Lunes 12 Diciembre 2016 10:13:21')
            ->assertResponseOk();
    }

    /** @test */
    public function show_with_contactsable_employee()
    {
        $relationship = factory(\Controlqtime\Core\Entities\Relationship::class)->create();

        $this->employee->contactsable()->create([
            'contactsable_id'         => $this->employee->id,
            'contactsable_type'       => 'Controlqtime\Core\Entities\Employee',
            'contact_relationship_id' => $relationship->id,
            'name_contact'            => 'José Miguel Osorio Sepúlveda',
            'email_contact'           => 'joseosorio@gmail.com',
            'address_contact'         => 'Pje. Limahuida 1990',
            'tel_contact'             => '+56983401021',
        ]);

        foreach ($this->employee->contactsable as $contactEmployee) {
            $this->visit('human-resources/employees/'.$this->employee->id)
                ->seeInElement('td', $contactEmployee->relationship->name)
                ->seeInElement('td', $contactEmployee->name_contact)
                ->seeInElement('td', $contactEmployee->tel_contact)
                ->seeInElement('td', $contactEmployee->email_contact)
                ->seeInElement('td', $contactEmployee->address_contact);
        }
    }
}
