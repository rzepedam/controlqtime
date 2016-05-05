<?php $i = 0; ?>
@foreach($company->legalRepresentatives as $legal_representative)
    <span id="legal_representative{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                    <span id="num_legal_representative{{ $i }}" class="text-success">Representante Legal #{{ $i + 1 }}</span>
                    @if ($i > 0)
                        <a id="legal_representative" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Representante Legal" data-html="true"><i class="fa fa-trash"></i></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_legal[]", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_legal[]", $legal_representative->id, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("male_surname[]", "Apellido Paterno", ["class" => "control-label"]) }}
                    {{ Form::text("male_surname[]", $legal_representative->male_surname, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("female_surname[]", "Apellido Materno", ["class" => "control-label"]) }}
                    {{ Form::text("female_surname[]", $legal_representative->female_surname, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("first_name[]", "Primer Nombre", ["class" => "control-label"]) }}
                    {{ Form::text("first_name[]", $legal_representative->first_name, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("second_name[]", "Segundo Nombre", ["class" => "control-label"]) }}
                    {{ Form::text("second_name[]", $legal_representative->second_name, ["class" => "form-control"]) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("rut_legal[]", "Rut", ["class" => "control-label"]) }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>
                    {{ Form::text("rut_legal[]", $legal_representative->rut_legal, ["class" => "form-control check_rut"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("birthday[]", "Fecha de Nac.") }}
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text("birthday[]", $legal_representative->birthday->format("d-m-Y"), ["class" => "form-control", "readonly"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label("nationality_id[]", "Nacionalidad", ["class" => "control-label"])  }}
                    {{ Form::select("nationality_id[]", $nationalities, $legal_representative->nationality_id, ["class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone1_legal[]", "Teléfono 1", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        {{ Form::text("phone1_legal[]", $legal_representative->phone1_legal, ["class" => "form-control"]) }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label("phone2_legal[]", "Teléfono 2", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-fax"></i>
                        </div>
                        {{ Form::text("phone2_legal[]", $legal_representative->phone2_legal, ["class" => "form-control"]) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("email_legal[]", "Email", ["class" => "control-label"]) }}
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        {{ Form::text("email_legal[]", $legal_representative->email_legal, ["id" => "Representative", "class" => "form-control", "onBlur" => "$(this).checkEmail(this)"]) }}
                    </div>
                </div>
            </div>
        </div>
        <hr />
    </span>
    <?php $i++; ?>
@endforeach