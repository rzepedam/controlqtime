<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\TermAndObligatory;

class TermAndObligatoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('term_and_obligatories')->truncate();
		
		TermAndObligatory::create([
			'id'      => 1,
			'name'    => 'No podrá tomar parte directa o indirectamente en negocios, empleos u ocupaciones lucrativas  que estén relacionados con actividades propias del giro del Empleador y se compromete a prestar sus servicios en forma exclusiva a este último.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 2,
			'name'    => 'No podrá revelar a terceros, sea en forma escrita o verbal, cualquier información, procedimientos, documentos, programas, etx. de que tome conocimientos con motivo de la prestación de sus servicios para el Empleador y sea que la información tenga o no carácter confidencial.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 3,
			'name'    => 'No podrá usar los materiales, implementos, instalaciones y bienes del Empleador o sobre los cuales éste tenga algún derecho, en fines distintos a aquellos que sirvan para el cumplimiento estricto de las funciones a que se ha obligado por medio de este contrato.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 4,
			'name'    => 'No podrá adquirir, comprar, vender, ceder, transferir, obtener, solicitar o negociar de manera pura y simple o bien, sujeto a cualquier condición, plazo o modalidad, para sí o para terceros, en áreas donde el Empleador esté desarrollando actividades.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 5,
			'name'    => 'No podrá utilizar, introducir o reproducir software y programas computacionales no licenciados ni autorizados por su titular, ya que constituye infracción a la legislación de Propiedad Intelectual y expone al Empleador a sanciones severas a sus sistemas y a daños irreparables. Conforme a lo anterior, constituirá incumplimiento grave de las obligaciones que el presente contrato impone al Trabajador la utilización dentro de la compañía de software ilegales, la introducción a los sistemas de la misma de dichos software y la reproducción no autorizada de los software desarrollados por el Empleador o licenciados por este.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 6,
			'name'    => 'Deberá ceñirse estrictamente a las instrucciones, manuales, directrices y procedimientos que le imparta el Empleador a través de sus superiores directos o por medio de normas generales impartidas internamente. Asimismo, se obliga a cumplir todas las instrucciones, reglas, políticas, reglamento interno y prácticas acorde con sus funciones que de tiempo en tiempo le imparta el Empleador.',
			'default' => 1
		]);
		
		TermAndObligatory::create([
			'id'      => 7,
			'name'    => 'Todos aquellos procedimientos o métodos de elaboración, inventos o descubrimientos que el Trabajador realice como consecuencia y con ocasión de sus servicios para el Empleador serán de exclusivo dominio de éste último, sin mayor cargo para el Empleador, pues es condición del presente contrato que los trabajos individuales o en colaboración con otros trabajadores que el Trabajador realice y que se relacionen con el cargo que desempeña, quedan totalmente pagados con las remuneraciones que a su favor establece la cláusula Cuarta del presente instrumento. Asimismo, el Trabajador declara que la obligación contenida en este párrafo comprende tanto los trabajos realizados mientras esté vigente el contrato como los completados por el Empleador después de terminado el contrato. El Trabajador acuerda que en el evento que registre propiedad intelectual, patentes u obtenga otros derechos sobre un producto de trabajo, obtendrá dicho registro o derecho a nombre del Empleador o si lo registra bajo su nombre, cederá a éste el registro de propiedad intelectual, patente u otro derecho si el Empleador así se lo solicitare.',
			'default' => 1
		]);
	
	    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
