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
    'unique'               => 'El <strong>:attribute</strong> ya ha sido registrado.',
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
        'address'           => '<strong>Dirección</strong>',
        'birthday'          => '<strong>Fecha de Nac.</strong>',
        'commune_id'        => '<strong>Comuna</strong>',
        'company_id'        => '<strong>Empresa</strong>',
        'email'             => '<strong>Email</strong>',
        'female_surname'    => '<strong>Apellido Materno</strong>',
        'firm_name'         => '<strong>Razón Social</strong>',
        'first_name'        => '<strong>Primer Nombre</strong>',
        'floor'             => '<strong>Piso</strong>',
        'forecast_id'       => '<strong>Previsión</strong>',
        'gender_id'         => '<strong>Sexo</strong>',
        'gyre'              => '<strong>Giro</strong>',
        'lot'               => '<strong>Lote</strong>',
        'male_surname'      => '<strong>Apellido Paterno</strong>',
        'muni_license'      => '<strong>Patente Municipal</strong>',
        'mutuality_id'      => '<strong>Mutualidad</strong>',
        'nationality_id'    => '<strong>Nacionalidad</strong>',
        'name'              => '<strong>Nombre</strong>',
        'num'               => '<strong>N°</strong>',
        'ofi'               => '<strong>Oficina</strong>',
        'pension_id'        => '<strong>AFP</strong>',
        'phone1'            => '<strong>Teléfono 1</strong>',
        'phone2'            => '<strong>Teléfono 2</strong>',
        'rating_id'         => '<strong>Cargo</strong>',
        'rut'               => '<strong>Rut</strong>',
        'second_name'       => '<strong>Segundo Nombre</strong>',
        'start_act'         => '<strong>Inicio Act</strong>.',

        /* Set array attributes in fields within loop */
        'birthday0'         => '<strong>Fecha de Nac. 1</strong>',
        'birthday1'         => '<strong>Fecha de Nac. 2</strong>',
        'birthday2'         => '<strong>Fecha de Nac. 3</strong>',
        'birthday3'         => '<strong>Fecha de Nac. 4</strong>',
        'birthday4'         => '<strong>Fecha de Nac. 5</strong>',
        'email0'            => '<strong>Email 1</strong>',
        'email1'            => '<strong>Email 2</strong>',
        'email2'            => '<strong>Email 3</strong>',
        'email3'            => '<strong>Email 4</strong>',
        'email4'            => '<strong>Email 5</strong>',
        'female_surname0'   => '<strong>Apellido Materno 1</strong>',
        'female_surname1'   => '<strong>Apellido Materno 2</strong>',
        'female_surname2'   => '<strong>Apellido Materno 3</strong>',
        'female_surname3'   => '<strong>Apellido Materno 4</strong>',
        'female_surname4'   => '<strong>Apellido Materno 5</strong>',
        'first_name0'       => '<strong>Primer Nombre 1</strong>',
        'first_name1'       => '<strong>Primer Nombre 2</strong>',
        'first_name2'       => '<strong>Primer Nombre 3</strong>',
        'first_name3'       => '<strong>Primer Nombre 4</strong>',
        'first_name4'       => '<strong>Primer Nombre 5</strong>',
        'male_surname0'     => '<strong>Apellido Paterno 1</strong>',
        'male_surname1'     => '<strong>Apellido Paterno 2</strong>',
        'male_surname2'     => '<strong>Apellido Paterno 3</strong>',
        'male_surname3'     => '<strong>Apellido Paterno 4</strong>',
        'male_surname4'     => '<strong>Apellido Paterno 5</strong>',
        'nationality_id0'   => '<strong>Nacionalidad 1</strong>',
        'nationality_id1'   => '<strong>Nacionalidad 2</strong>',
        'nationality_id2'   => '<strong>Nacionalidad 3</strong>',
        'nationality_id3'   => '<strong>Nacionalidad 4</strong>',
        'nationality_id4'   => '<strong>Nacionalidad 5</strong>',
        'phone1-0'          => '<strong>Teléfono 1</strong>',
        'phone1-1'          => '<strong>Teléfono 1</strong>',
        'phone1-2'          => '<strong>Teléfono 1</strong>',
        'phone1-3'          => '<strong>Teléfono 1</strong>',
        'phone1-4'          => '<strong>Teléfono 1</strong>',
        'phone2-0'          => '<strong>Teléfono 2</strong>',
        'phone2-1'          => '<strong>Teléfono 2</strong>',
        'phone2-2'          => '<strong>Teléfono 2</strong>',
        'phone2-3'          => '<strong>Teléfono 2</strong>',
        'phone2-4'          => '<strong>Teléfono 2</strong>',
        'rut0'              => '<strong>Rut 1</strong>',
        'rut1'              => '<strong>Rut 2</strong>',
        'rut2'              => '<strong>Rut 3</strong>',
        'rut3'              => '<strong>Rut 4</strong>',
        'rut4'              => '<strong>Rut 5</strong>',
        'second_name0'      => '<strong>Segundo Nombre 1</strong>',
        'second_name1'      => '<strong>Segundo Nombre 2</strong>',
        'second_name2'      => '<strong>Segundo Nombre 3</strong>',
        'second_name3'      => '<strong>Segundo Nombre 4</strong>',
        'second_name4'      => '<strong>Segundo Nombre 5</strong>',

    ],

];
