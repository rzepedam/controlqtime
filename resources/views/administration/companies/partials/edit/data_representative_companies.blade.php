<?php $i = 0; ?>
@foreach($company->representativeCompanies as $representative_company)
    <span id="representative_company{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                    <span id="num_representative_company{{ $i }}" class="text-success">Representante Empresa #{{ $i + 1 }}</span>
                    @if ($i > 0)
                        <a id="representative_company" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Representante Empresa" data-html="true"><i class="fa fa-trash"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 form-group hide">
                {{ Form::label("id_representative" . $i, "ID", ["class" => "control-label"]) }}
                {{ Form::text("id_representative[]", $representative_company->id, ["id" => "id_representative" . $i, "class" => "form-control"]) }}
            </div>
            <div class="col-md-3 form-group">
                {{ Form::label('type_representative_id', 'Tipo Representante', ['class' => 'control-label']) }}
                {{ Form::select('type_representative_id[]', $type_representatives, $representative_company->typeRepresentative->id, ['class' => 'form-control']) }}
            </div>
            <div class="col-md-3 form-group">
                {{ Form::label("male_surname", "Apellido Paterno", ["class" => "control-label"]) }}
                {{ Form::text("male_surname[]", $representative_company->male_surname, ["class" => "form-control"]) }}
            </div>
            <div class="col-md-3 form-group">
                {{ Form::label("female_surname", "Apellido Materno", ["class" => "control-label"]) }}
                {{ Form::text("female_surname[]", $representative_company->female_surname, ["class" => "form-control"]) }}
            </div>
            <div class="col-md-3 form-group">
                {{ Form::label("first_name", "Primer Nombre", ["class" => "control-label"]) }}
                {{ Form::text("first_name[]", $representative_company->first_name, ["class" => "form-control"]) }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 form-group">
                {{ Form::label("second_name", "Segundo Nombre", ["class" => "control-label"]) }}
                {{ Form::text("second_name[]", $representative_company->second_name, ["class" => "form-control"]) }}
            </div>
            <div class="col-md-2 form-group">
                {{ Form::label("rut_representative", "Rut", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>
                {{ Form::text("rut_representative[]", $representative_company->rut_representative, ["class" => "form-control check_rut"]) }}
            </div>
            <div class="col-md-2 form-group">
                {{ Form::label("birthday", "Fecha de Nac.") }}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text("birthday[]", $representative_company->birthday->format("d-m-Y"), ["class" => "form-control", "readonly"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("nationality_id", "Nacionalidad", ["class" => "control-label"])  }}
                    {{ Form::select("nationality_id[]", $nationalities, $representative_company->nationality_id, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-2 form-group">
                {{ Form::label("phone1_representative", "Teléfono 1", ["class" => "control-label"]) }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                    </div>
                    {{ Form::text("phone1_representative[]", $representative_company->phone1_representative, ["class" => "form-control"]) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 form-group">
                {{ Form::label("phone2_representative", "Teléfono 2", ["class" => "control-label"]) }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-fax"></i>
                    </div>
                    {{ Form::text("phone2_representative[]", $representative_company->phone2_representative, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-6 form-group">
                {{ Form::label("email_representative", "Email", ["class" => "control-label"]) }}
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    {{ Form::text("email_representative[]", $representative_company->email_representative, ["id" => "Representative", "class" => "form-control"]) }}
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>
@endforeach