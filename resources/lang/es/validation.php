<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | such as the size rules. Feel free to tweak each of these messages.
    |
    */

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

        'code_internal'                         => 'Código Interno',

        /*
         * Vehículos
         */

        'patent'                                => 'Patente',
        'code'                                  => 'Cód. Interno',
        'type_vehicle_id'                       => 'Tipo de Vehículo',
        'model_vehicle_id'                      => 'Modelo',
        'terminal_id'                           => 'Terminal',
        'year'                                  => 'Año',


        /*
         * Parentescos Familiares
         */

        'relationship_id0'                      => 'Relación',
        'relationship_id1'                      => 'Relación',
        'relationship_id2'                      => 'Relación',
        'relationship_id3'                      => 'Relación',
        'relationship_id4'                      => 'Relación',
        'relationship_id5'                      => 'Relación',
        'manpower_family_id0'                   => 'Nombre Familiar',
        'manpower_family_id1'                   => 'Nombre Familiar',
        'manpower_family_id2'                   => 'Nombre Familiar',
        'manpower_family_id3'                   => 'Nombre Familiar',
        'manpower_family_id4'                   => 'Nombre Familiar',
        'manpower_family_id5'                   => 'Nombre Familiar',

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
         * Subsidiaries
         */
        'address_suc0'                          => 'Dirección Sucursal 1',
        'address_suc1'                          => 'Dirección Sucursal 2',
        'address_suc2'                          => 'Dirección Sucursal 3',
        'address_suc3'                          => 'Dirección Sucursal 4',
        'address_suc4'                          => 'Dirección Sucursal 5',
        'address_suc5'                          => 'Dirección Sucursal 6',
        'address_suc6'                          => 'Dirección Sucursal 7',
        'address_suc7'                          => 'Dirección Sucursal 8',
        'address_suc8'                          => 'Dirección Sucursal 9',
        'address_suc10'                         => 'Dirección Sucursal 10',
        'commune_suc_id0'                       => 'Comuna Sucursal 1',
        'commune_suc_id1'                       => 'Comuna Sucursal 2',
        'commune_suc_id2'                       => 'Comuna Sucursal 3',
        'commune_suc_id3'                       => 'Comuna Sucursal 4',
        'commune_suc_id4'                       => 'Comuna Sucursal 5',
        'commune_suc_id5'                       => 'Comuna Sucursal 6',
        'commune_suc_id6'                       => 'Comuna Sucursal 7',
        'commune_suc_id7'                       => 'Comuna Sucursal 8',
        'commune_suc_id8'                       => 'Comuna Sucursal 9',
        'commune_suc_id9'                       => 'Comuna Sucursal 10',
        'num_suc0'                              => 'N° Sucursal 1',
        'num_suc1'                              => 'N° Sucursal 2',
        'num_suc2'                              => 'N° Sucursal 3',
        'num_suc3'                              => 'N° Sucursal 4',
        'num_suc4'                              => 'N° Sucursal 5',
        'num_suc5'                              => 'N° Sucursal 6',
        'num_suc6'                              => 'N° Sucursal 7',
        'num_suc7'                              => 'N° Sucursal 8',
        'num_suc8'                              => 'N° Sucursal 9',
        'num_suc9'                              => 'N° Sucursal 10',
        'lot_suc0'                              => 'Lote Sucursal 1',
        'lot_suc1'                              => 'Lote Sucursal 2',
        'lot_suc2'                              => 'Lote Sucursal 3',
        'lot_suc3'                              => 'Lote Sucursal 4',
        'lot_suc4'                              => 'Lote Sucursal 5',
        'lot_suc5'                              => 'Lote Sucursal 6',
        'lot_suc6'                              => 'Lote Sucursal 7',
        'lot_suc7'                              => 'Lote Sucursal 8',
        'lot_suc8'                              => 'Lote Sucursal 9',
        'lot_suc9'                              => 'Lote Sucursal 10',
        'ofi_suc0'                              => 'Oficina Sucursal 1',
        'ofi_suc1'                              => 'Oficina Sucursal 2',
        'ofi_suc2'                              => 'Oficina Sucursal 3',
        'ofi_suc3'                              => 'Oficina Sucursal 4',
        'ofi_suc4'                              => 'Oficina Sucursal 5',
        'ofi_suc5'                              => 'Oficina Sucursal 6',
        'ofi_suc6'                              => 'Oficina Sucursal 7',
        'ofi_suc7'                              => 'Oficina Sucursal 8',
        'ofi_suc8'                              => 'Oficina Sucursal 9',
        'ofi_suc9'                              => 'Oficina Sucursal 10',
        'floor_suc0'                            => 'Piso Sucursal 1',
        'floor_suc1'                            => 'Piso Sucursal 2',
        'floor_suc2'                            => 'Piso Sucursal 3',
        'floor_suc3'                            => 'Piso Sucursal 4',
        'floor_suc4'                            => 'Piso Sucursal 5',
        'floor_suc5'                            => 'Piso Sucursal 6',
        'floor_suc6'                            => 'Piso Sucursal 7',
        'floor_suc7'                            => 'Piso Sucursal 8',
        'floor_suc8'                            => 'Piso Sucursal 9',
        'floor_suc9'                            => 'Piso Sucursal 10',
        'muni_license_suc0'                     => 'Patente Municipal Sucursal 1',
        'muni_license_suc1'                     => 'Patente Municipal Sucursal 2',
        'muni_license_suc2'                     => 'Patente Municipal Sucursal 3',
        'muni_license_suc3'                     => 'Patente Municipal Sucursal 4',
        'muni_license_suc4'                     => 'Patente Municipal Sucursal 5',
        'muni_license_suc5'                     => 'Patente Municipal Sucursal 6',
        'muni_license_suc6'                     => 'Patente Municipal Sucursal 7',
        'muni_license_suc7'                     => 'Patente Municipal Sucursal 8',
        'muni_license_suc8'                     => 'Patente Municipal Sucursal 9',
        'muni_license_suc9'                     => 'Patente Municipal Sucursal 10',
        'email_suc0'                            => 'Email Sucursal 1',
        'email_suc1'                            => 'Email Sucursal 2',
        'email_suc2'                            => 'Email Sucursal 3',
        'email_suc3'                            => 'Email Sucursal 4',
        'email_suc4'                            => 'Email Sucursal 5',
        'email_suc5'                            => 'Email Sucursal 6',
        'email_suc6'                            => 'Email Sucursal 7',
        'email_suc7'                            => 'Email Sucursal 8',
        'email_suc8'                            => 'Email Sucursal 9',
        'email_suc9'                            => 'Email Sucursal 10',
        'phone1_suc-0'                          => 'Teléfono 1 Sucursal 1',
        'phone1_suc-1'                          => 'Teléfono 1 Sucursal 2',
        'phone1_suc-2'                          => 'Teléfono 1 Sucursal 3',
        'phone1_suc-3'                          => 'Teléfono 1 Sucursal 4',
        'phone1_suc-4'                          => 'Teléfono 1 Sucursal 5',
        'phone1_suc-5'                          => 'Teléfono 1 Sucursal 6',
        'phone1_suc-6'                          => 'Teléfono 1 Sucursal 7',
        'phone1_suc-7'                          => 'Teléfono 1 Sucursal 8',
        'phone1_suc-8'                          => 'Teléfono 1 Sucursal 9',
        'phone1_suc-9'                          => 'Teléfono 1 Sucursal 10',
        'phone2_suc-0'                          => 'Teléfono 2 Sucursal 1',
        'phone2_suc-1'                          => 'Teléfono 2 Sucursal 2',
        'phone2_suc-2'                          => 'Teléfono 2 Sucursal 3',
        'phone2_suc-3'                          => 'Teléfono 2 Sucursal 4',
        'phone2_suc-4'                          => 'Teléfono 2 Sucursal 5',
        'phone2_suc-5'                          => 'Teléfono 2 Sucursal 6',
        'phone2_suc-6'                          => 'Teléfono 2 Sucursal 7',
        'phone2_suc-7'                          => 'Teléfono 2 Sucursal 8',
        'phone2_suc-8'                          => 'Teléfono 2 Sucursal 9',
        'phone2_suc-9'                          => 'Teléfono 2 Sucursal 10',

    ],

];
