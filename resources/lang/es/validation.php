<?php

return [
	
	'accepted'             => '<strong>:attribute</strong> debe ser aceptado.',
	'active_url'           => '<strong>:attribute</strong> no es una URL válida.',
	'after'                => '<strong>:attribute</strong> debe ser una fecha posterior a :date.',
	'alpha'                => '<strong>:attribute</strong> solo debe contener letras.',
	'alpha_dash'           => '<strong>:attribute</strong> solo debe contener letras, números y guiones.',
	'alpha_num'            => '<strong>:attribute</strong> solo debe contener letras y números.',
	'array'                => '<strong>:attribute</strong> debe ser un conjunto.',
	'before'               => '<strong>:attribute</strong> debe ser una fecha anterior a :date.',
	'between'              => [
		'numeric' => '<strong>:attribute</strong> tiene que estar entre :min - :max.',
		'file'    => '<strong>:attribute</strong> debe pesar entre :min - :max kilobytes.',
		'string'  => '<strong>:attribute</strong> tiene que tener entre :min - :max caracteres.',
		'array'   => '<strong>:attribute</strong> tiene que tener entre :min - :max ítems.',
	],
	'boolean'              => 'El campo <strong>:attribute</strong> debe tener un valor verdadero o falso.',
	'confirmed'            => 'La confirmación de <strong>:attribute</strong> no coincide.',
	'date'                 => 'El campo <strong>:attribute</strong> no es una fecha válida.',
	'date_format'          => 'El campo <strong>:attribute</strong> no corresponde al formato :format.',
	'different'            => 'El campo <strong>:attribute</strong> y :other deben ser diferentes.',
	'digits'               => 'El campo <strong>:attribute</strong> debe tener :digits dígitos.',
	'digits_between'       => 'El campo <strong>:attribute</strong> debe tener entre :min y :max dígitos.',
	'email'                => 'El <strong>:attribute</strong> no es un correo válido',
	'exists'               => 'El campo <strong>:attribute</strong> no es válido.',
	'filled'               => 'El campo <strong>:attribute</strong> es obligatorio.',
	'image'                => '<strong>:attribute</strong> debe ser una imagen.',
	'in'                   => '<strong>:attribute</strong> es inválido.',
	'integer'              => 'El campo <strong>:attribute</strong> debe ser un número entero.',
	'ip'                   => '<strong>:attribute</strong> debe ser una dirección IP válida.',
	'json'                 => 'El campo <strong>:attribute</strong> debe tener una cadena JSON válida.',
	'max'                  => [
		'numeric' => 'El campo <strong>:attribute</strong> no debe ser mayor a :max caracteres',
		'file'    => 'El campo <strong>:attribute</strong> no debe ser mayor que :max kilobytes.',
		'string'  => 'El campo <strong>:attribute</strong> no debe ser mayor que :max caracteres.',
		'array'   => 'El campo <strong>:attribute</strong> no debe tener más de :max elementos.',
	],
	'mimes'                => '<strong>:attribute</strong> debe ser un archivo con formato: :values.',
	'min'                  => [
		'numeric' => 'El tamaño de <strong>:attribute</strong> debe ser de al menos :min.',
		'file'    => 'El tamaño de <strong>:attribute</strong> debe ser de al menos :min kilobytes.',
		'string'  => 'El campo <strong>:attribute</strong> debe contener al menos :min caracteres.',
		'array'   => '<strong>:attribute</strong> debe tener al menos :min elementos.',
	],
	'not_in'               => 'El campo <strong>:attribute</strong> es inválido.',
	'numeric'              => '<strong>:attribute</strong> debe ser numérico.',
	'regex'                => 'El formato de <strong>:attribute</strong> es inválido.',
	'required'             => 'El campo <strong>:attribute</strong> es obligatorio.',
	'required_if'          => 'El campo <strong>:attribute</strong> es obligatorio cuando :other es :value.',
	'required_unless'      => 'The <strong>:attribute</strong> field is required unless :other is in :values.',
	'required_with'        => 'El campo <strong>:attribute</strong> es obligatorio cuando :values está presente.',
	'required_with_all'    => 'El campo <strong>:attribute</strong> es obligatorio cuando :values está presente.',
	'required_without'     => 'El campo <strong>:attribute</strong> es obligatorio cuando :values no está presente.',
	'required_without_all' => 'El campo <strong>:attribute</strong> es obligatorio cuando ninguno de :values estén presentes.',
	'same'                 => '<strong>:attribute</strong> y :other deben coincidir.',
	'size'                 => [
		'numeric' => 'El tamaño de <strong>:attribute</strong> debe ser :size.',
		'file'    => 'El tamaño de <strong>:attribute</strong> debe ser :size kilobytes.',
		'string'  => '<strong>:attribute</strong> debe contener :size caracteres.',
		'array'   => '<strong>:attribute</strong> debe contener :size elementos.',
	],
	'string'               => 'El campo <strong>:attribute</strong> debe ser una cadena de caracteres.',
	'timezone'             => 'El <strong>:attribute</strong> debe ser una zona válida.',
	'unique'               => 'El campo <strong>:attribute</strong> ya ha sido registrado.',
	'url'                  => 'El formato <strong>:attribute</strong> es inválido.',
	
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/
	
	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],
	
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/
	
	'attributes' => [
		
		/*
		 * Company
		 */
		'type_company_id'           => 'Tipo Empresa',
		'rut'                       => 'Rut',
		'firm_name'                 => 'Razón Social',
		'gyre'                      => 'Giro',
		'start_act'                 => 'Inicio Act.',
		'address'                   => 'Dirección',
		'region_id'                 => 'Región',
		'province_id'               => 'Provincia',
		'commune_id'                => 'Comuna',
		'num'                       => 'N°',
		'lot'                       => 'Lote',
		'bod'                       => 'Bodega',
		'ofi'                       => 'Oficina',
		'floor'                     => 'Piso',
		'muni_license'              => 'Patente Municipal',
		'phone1'                    => 'Teléfono 1',
		'phone2'                    => 'Teléfono 2',
		'email_company'             => 'Email Empresa',
		
		/*
		 * Legal Representative
		 */
		'rut_representative'        => 'Rut Representante Legal',
		'phone1_representative'     => 'Teléfono Representante Legal',
		'phone2_representative'     => 'Teléfono Representante Legal',
		'email_representative'      => 'Email Representante Legal',
		
		/*
		 * Employees
		 */
		'male_surname'              => 'Apellido Paterno',
		'female_surname'            => 'Apellido Materno',
		'first_name'                => 'Primer Nombre',
		'second_name'               => 'Segundo Nombre',
		'birthday'                  => 'Fecha de Nac.',
		'nationality_id'            => 'Nacionalidad',
		'gender_id'                 => 'Sexo',
		'num_home'                  => 'Nº Casa',
		'company_id'                => 'Empresa',
		'code'                      => 'Cód. Interno',
		
		/*
		 * Vehículos
		 */
		'model_vehicle_id'          => 'Modelo',
		'type_vehicle_id'           => 'Tipo de Vehículo',
		'trademark_id'              => 'Marca',
		'acquisition_date'          => 'Fecha Adquisición',
		'inscription_date'          => 'Fecha Inscripción',
		'year'                      => 'Año',
		'color'                     => 'Color',
		'patent'                    => 'Patente',
		'fuel_id'                   => 'Combustible',
		'num_chasis'                => 'Nº Chasis',
		'num_motor'                 => 'Nº Motor',
		'km'                        => 'Kilometraje',
		'engine_cubic'              => 'Cilindraje Motor',
		'weight'                    => 'Peso',
		'carr'                      => 'Carrocería',
		'num_plazas'                => 'Nº Plazas',
		
		/*
		 * Others
		 */
		'acr'                       => 'Acrónimo',
		'name'                      => 'Nombre',
		'terminal_id'               => 'Terminal',
		'country_id'                => 'País',
		'type_institution_id'       => 'Tipo de Institución',
		'created_at'                => 'Fecha Creación',
		'dur'                       => 'Nº de Meses',
		
		/*
		 * Api's
		 */
		'num_device'                => 'Nº Dispositivo',
		
		/*
		 * Contract
		 */
		'init_morning'              => 'Desde (Horario Mañana)',
		'end_morning'               => 'Hasta (Horario Mañana)',
		'init_afternoon'            => 'Desde (Horario Tarde)',
		'end_afternoon'             => 'Hasta (Horario Tarde)',
		'salary'                    => 'Sueldo Base',
		'mobilization'              => 'Movilización',
		'collation'                 => 'Colación',
		
		/*
		 * Check-Vehicle-Form
		 */
		'state_piece_vehicle_id.0'  => 'Estado Pieza Vehículo 1',
		'state_piece_vehicle_id.1'  => 'Estado Pieza Vehículo 2',
		'state_piece_vehicle_id.2'  => 'Estado Pieza Vehículo 3',
		'state_piece_vehicle_id.3'  => 'Estado Pieza Vehículo 4',
		'state_piece_vehicle_id.4'  => 'Estado Pieza Vehículo 5',
		'state_piece_vehicle_id.5'  => 'Estado Pieza Vehículo 6',
		'state_piece_vehicle_id.6'  => 'Estado Pieza Vehículo 7',
		'state_piece_vehicle_id.7'  => 'Estado Pieza Vehículo 8',
		'state_piece_vehicle_id.8'  => 'Estado Pieza Vehículo 9',
		'state_piece_vehicle_id.9'  => 'Estado Pieza Vehículo 10',
		'state_piece_vehicle_id.10' => 'Estado Pieza Vehículo 11',
		'state_piece_vehicle_id.11' => 'Estado Pieza Vehículo 12',
		'state_piece_vehicle_id.12' => 'Estado Pieza Vehículo 13',
		'state_piece_vehicle_id.13' => 'Estado Pieza Vehículo 14',
		'state_piece_vehicle_id.14' => 'Estado Pieza Vehículo 15',
		'state_piece_vehicle_id.15' => 'Estado Pieza Vehículo 16',
		'state_piece_vehicle_id.16' => 'Estado Pieza Vehículo 17',
		'state_piece_vehicle_id.17' => 'Estado Pieza Vehículo 18',
		'state_piece_vehicle_id.18' => 'Estado Pieza Vehículo 19',
		'state_piece_vehicle_id.19' => 'Estado Pieza Vehículo 20',
		'state_piece_vehicle_id.20' => 'Estado Pieza Vehículo 21',
		'state_piece_vehicle_id.21' => 'Estado Pieza Vehículo 22',
		'state_piece_vehicle_id.22' => 'Estado Pieza Vehículo 23',
		'state_piece_vehicle_id.23' => 'Estado Pieza Vehículo 24',
		'state_piece_vehicle_id.24' => 'Estado Pieza Vehículo 25',
		'state_piece_vehicle_id.25' => 'Estado Pieza Vehículo 26',
		'state_piece_vehicle_id.26' => 'Estado Pieza Vehículo 27',
		'state_piece_vehicle_id.27' => 'Estado Pieza Vehículo 28',
		'state_piece_vehicle_id.28' => 'Estado Pieza Vehículo 29',
		'state_piece_vehicle_id.29' => 'Estado Pieza Vehículo 30'
	],

];
