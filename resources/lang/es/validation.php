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
    'exists'               => '<strong>:attribute</strong> es inválido.',
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
        'string'  => '<strong>:attribute</strong> debe contener al menos :min caracteres.',
        'array'   => '<strong>:attribute</strong> debe tener al menos :min elementos.',
    ],
    'not_in'               => '<strong>:attribute</strong> es inválido.',
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

    'custom'               => [
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
         * Estudios Académicos
         */

        'degree_id0'                            => 'Grado Académico',
        'degree_id1'                            => 'Grado Académico',
        'degree_id2'                            => 'Grado Académico',
        'degree_id3'                            => 'Grado Académico',
        'degree_id4'                            => 'Grado Académico',
        'degree_id5'                            => 'Grado Académico',
        'name_study0'                           => 'Nombre Estudio',
        'name_study1'                           => 'Nombre Estudio',
        'name_study2'                           => 'Nombre Estudio',
        'name_study3'                           => 'Nombre Estudio',
        'name_study4'                           => 'Nombre Estudio',
        'name_study5'                           => 'Nombre Estudio',
        'institution_study_id0'                 => 'Institución',
        'institution_study_id1'                 => 'Institución',
        'institution_study_id2'                 => 'Institución',
        'institution_study_id3'                 => 'Institución',
        'institution_study_id4'                 => 'Institución',
        'institution_study_id5'                 => 'Institución',
        'date0'                                 => 'Fecha Obtención',
        'date1'                                 => 'Fecha Obtención',
        'date2'                                 => 'Fecha Obtención',
        'date3'                                 => 'Fecha Obtención',
        'date4'                                 => 'Fecha Obtención',
        'date5'                                 => 'Fecha Obtención',

        /*
         * Certificaciones
         */

        'type_certification_id0'                => 'Tipo Certificación',
        'type_certification_id1'                => 'Tipo Certificación',
        'type_certification_id2'                => 'Tipo Certificación',
        'type_certification_id3'                => 'Tipo Certificación',
        'type_certification_id4'                => 'Tipo Certificación',
        'type_certification_id5'                => 'Tipo Certificación',
        'expired_certification0'                => 'Fecha Expiración',
        'expired_certification1'                => 'Fecha Expiración',
        'expired_certification2'                => 'Fecha Expiración',
        'expired_certification3'                => 'Fecha Expiración',
        'expired_certification4'                => 'Fecha Expiración',
        'expired_certification5'                => 'Fecha Expiración',
        'institution_certification_id0'         => 'Institución',
        'institution_certification_id1'         => 'Institución',
        'institution_certification_id2'         => 'Institución',
        'institution_certification_id3'         => 'Institución',
        'institution_certification_id4'         => 'Institución',
        'institution_certification_id5'         => 'Institución',

        /*
         * Especialidades
         */

        'type_speciality_id0'                   => 'Tipo Especialidad',
        'type_speciality_id1'                   => 'Tipo Especialidad',
        'type_speciality_id2'                   => 'Tipo Especialidad',
        'type_speciality_id3'                   => 'Tipo Especialidad',
        'type_speciality_id4'                   => 'Tipo Especialidad',
        'type_speciality_id5'                   => 'Tipo Especialidad',
        'expired_speciality0'                   => 'Fecha Expiración',
        'expired_speciality1'                   => 'Fecha Expiración',
        'expired_speciality2'                   => 'Fecha Expiración',
        'expired_speciality3'                   => 'Fecha Expiración',
        'expired_speciality4'                   => 'Fecha Expiración',
        'expired_speciality5'                   => 'Fecha Expiración',
        'institution_speciality_id0'            => 'Institución',
        'institution_speciality_id1'            => 'Institución',
        'institution_speciality_id2'            => 'Institución',
        'institution_speciality_id3'            => 'Institución',
        'institution_speciality_id4'            => 'Institución',
        'institution_speciality_id5'            => 'Institución',

        /*
         * Licencias Profesionales
         */

        'type_professional_license_id0'         => 'Tipo Licencia',
        'type_professional_license_id1'         => 'Tipo Licencia',
        'type_professional_license_id2'         => 'Tipo Licencia',
        'type_professional_license_id3'         => 'Tipo Licencia',
        'type_professional_license_id4'         => 'Tipo Licencia',
        'type_professional_license_id5'         => 'Tipo Licencia',
        'expired_license0'                      => 'Fecha Expiración',
        'expired_license1'                      => 'Fecha Expiración',
        'expired_license2'                      => 'Fecha Expiración',
        'expired_license3'                      => 'Fecha Expiración',
        'expired_license4'                      => 'Fecha Expiración',
        'expired_license5'                      => 'Fecha Expiración',

        /*
         * Discapacidades
         */

        'type_disability_id0'                   => 'Tipo Discapacidad',
        'type_disability_id1'                   => 'Tipo Discapacidad',
        'type_disability_id2'                   => 'Tipo Discapacidad',
        'type_disability_id3'                   => 'Tipo Discapacidad',
        'type_disability_id4'                   => 'Tipo Discapacidad',
        'type_disability_id5'                   => 'Tipo Discapacidad',
        'treatment_disability0'                 => 'Está en tratamiento',
        'treatment_disability1'                 => 'Está en tratamiento',
        'treatment_disability2'                 => 'Está en tratamiento',
        'treatment_disability3'                 => 'Está en tratamiento',
        'treatment_disability4'                 => 'Está en tratamiento',
        'treatment_disability5'                 => 'Está en tratamiento',

        /*
         * Enfermedades
         */

        'type_disease_id0'                      => 'Tipo Enfermedad',
        'type_disease_id1'                      => 'Tipo Enfermedad',
        'type_disease_id2'                      => 'Tipo Enfermedad',
        'type_disease_id3'                      => 'Tipo Enfermedad',
        'type_disease_id4'                      => 'Tipo Enfermedad',
        'type_disease_id5'                      => 'Tipo Enfermedad',
        'treatment_disease0'                    => 'Está en tratamiento',
        'treatment_disease1'                    => 'Está en tratamiento',
        'treatment_disease2'                    => 'Está en tratamiento',
        'treatment_disease3'                    => 'Está en tratamiento',
        'treatment_disease4'                    => 'Está en tratamiento',
        'treatment_disease5'                    => 'Está en tratamiento',

        /*
         * Exámenes
         */

        'type_exam_id0'                         => 'Tipo Examen',
        'type_exam_id1'                         => 'Tipo Examen',
        'type_exam_id2'                         => 'Tipo Examen',
        'type_exam_id3'                         => 'Tipo Examen',
        'type_exam_id4'                         => 'Tipo Examen',
        'type_exam_id5'                         => 'Tipo Examen',
        'expired_exam0'                         => 'Fecha Expiración',
        'expired_exam1'                         => 'Fecha Expiración',
        'expired_exam2'                         => 'Fecha Expiración',
        'expired_exam3'                         => 'Fecha Expiración',
        'expired_exam4'                         => 'Fecha Expiración',
        'expired_exam5'                         => 'Fecha Expiración',

        /*
         * Cargas Familiares
         */

        'name_responsability0'                  => 'Nombre Completo',
        'name_responsability1'                  => 'Nombre Completo',
        'name_responsability2'                  => 'Nombre Completo',
        'name_responsability3'                  => 'Nombre Completo',
        'name_responsability4'                  => 'Nombre Completo',
        'name_responsability5'                  => 'Nombre Completo',
        'rut_responsability0'                   => 'Rut',
        'rut_responsability1'                   => 'Rut',
        'rut_responsability2'                   => 'Rut',
        'rut_responsability3'                   => 'Rut',
        'rut_responsability4'                   => 'Rut',
        'rut_responsability5'                   => 'Rut',

        /*
         * Company
         */

        'address'                               => 'Dirección',
        'birthday'                              => 'Fecha de Nac.',
        'region_id'                             => 'Región',
        'province_id'                           => 'Provincia',
        'commune_id'                            => 'Comuna',
        'company_id'                            => 'Empresa',
        'email'                                 => 'Email',
        'female_surname'                        => 'Apellido Materno',
        'firm_name'                             => 'Razón Social',
        'first_name'                            => 'Primer Nombre',
        'floor'                                 => 'Piso',
        'forecast_id'                           => 'Previsión',
        'gender_id'                             => 'Sexo',
        'gyre'                                  => 'Giro',
        'lot'                                   => 'Lote',
        'male_surname'                          => 'Apellido Paterno',
        'muni_license'                          => 'Patente Municipal',
        'mutuality_id'                          => 'Mutualidad',
        'nationality_id'                        => 'Nacionalidad',
        'name'                                  => 'Nombre',
        'num'                                   => 'N°',
        'ofi'                                   => 'Oficina',
        'pension_id'                            => 'AFP',
        'phone1'                                => 'Teléfono 1',
        'phone2'                                => 'Teléfono 2',
        'rating_id'                             => 'Cargo',
        'rut'                                   => 'Rut',
        'second_name'                           => 'Segundo Nombre',
        'start_act'                             => 'Inicio Act.',

        /*
         * Legal Representative
         */

        'birthday0'                             => 'Fecha de Nac Rep. Legal 1',
        'birthday1'                             => 'Fecha de Nac Rep. Legal 2',
        'birthday2'                             => 'Fecha de Nac Rep. Legal 3',
        'birthday3'                             => 'Fecha de Nac Rep. Legal 4',
        'birthday4'                             => 'Fecha de Nac Rep. Legal 5',
        'email0'                                => 'Email Rep. Legal 1',
        'email1'                                => 'Email Rep. Legal 2',
        'email2'                                => 'Email Rep. Legal 3',
        'email3'                                => 'Email Rep. Legal 4',
        'email4'                                => 'Email Rep. Legal 5',
        'female_surname0'                       => 'Apellido Materno Rep. Legal 1',
        'female_surname1'                       => 'Apellido Materno Rep. Legal 2',
        'female_surname2'                       => 'Apellido Materno Rep. Legal 3',
        'female_surname3'                       => 'Apellido Materno Rep. Legal 4',
        'female_surname4'                       => 'Apellido Materno Rep. Legal 5',
        'first_name0'                           => 'Primer Nombre Rep. Legal 1',
        'first_name1'                           => 'Primer Nombre Rep. Legal 2',
        'first_name2'                           => 'Primer Nombre Rep. Legal 3',
        'first_name3'                           => 'Primer Nombre Rep. Legal 4',
        'first_name4'                           => 'Primer Nombre Rep. Legal 5',
        'male_surname0'                         => 'Apellido Paterno Rep. Legal 1',
        'male_surname1'                         => 'Apellido Paterno Rep. Legal 2',
        'male_surname2'                         => 'Apellido Paterno Rep. Legal 3',
        'male_surname3'                         => 'Apellido Paterno Rep. Legal 4',
        'male_surname4'                         => 'Apellido Paterno Rep. Legal 5',
        'nationality_id0'                       => 'Nacionalidad Rep. Legal 1',
        'nationality_id1'                       => 'Nacionalidad Rep. Legal 2',
        'nationality_id2'                       => 'Nacionalidad Rep. Legal 3',
        'nationality_id3'                       => 'Nacionalidad Rep. Legal 4',
        'nationality_id4'                       => 'Nacionalidad Rep. Legal 5',
        'phone1-0'                              => 'Teléfono 1 Rep. Legal 1',
        'phone1-1'                              => 'Teléfono 1 Rep. Legal 1',
        'phone1-2'                              => 'Teléfono 1 Rep. Legal 1',
        'phone1-3'                              => 'Teléfono 1 Rep. Legal 1',
        'phone1-4'                              => 'Teléfono 1 Rep. Legal 1',
        'phone2-0'                              => 'Teléfono 2 Rep. Legal 2',
        'phone2-1'                              => 'Teléfono 2 Rep. Legal 2',
        'phone2-2'                              => 'Teléfono 2 Rep. Legal 2',
        'phone2-3'                              => 'Teléfono 2 Rep. Legal 2',
        'phone2-4'                              => 'Teléfono 2 Rep. Legal 2',
        'rut0'                                  => 'Rut Rep. Legal 1',
        'rut1'                                  => 'Rut Rep. Legal 2',
        'rut2'                                  => 'Rut Rep. Legal 3',
        'rut3'                                  => 'Rut Rep. Legal 4',
        'rut4'                                  => 'Rut Rep. Legal 5',
        'second_name0'                          => 'Segundo Nombre Rep. Legal 1',
        'second_name1'                          => 'Segundo Nombre Rep. Legal 2',
        'second_name2'                          => 'Segundo Nombre Rep. Legal 3',
        'second_name3'                          => 'Segundo Nombre Rep. Legal 4',
        'second_name4'                          => 'Segundo Nombre Rep. Legal 5',

        /*
         * Vehículos
         */

        'model_vehicle_id'                      => 'Modelo',
        'type_vehicle_id'                       => 'Tipo de Vehículo',
        'year'                                  => 'Año',
        'color'                                 => 'Color',
        'patent'                                => 'Patente',
        'fuel_id'                               => 'Combustible',
        'num_chasis'                            => 'Nº Chasis',
        'num_motor'                             => 'Nº Motor',
        'km'                                    => 'Kilometraje',
        'engine_cubic'                          => 'Cilindraje Motor',
        'weight'                                => 'Peso',
        'code'                                  => 'Cód. Interno',

    ],

];
