<?php $i = 0; ?>
@foreach($employee->professionalLicenses as $professional_license)

    <span id="license{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                    <span id="num_license{{ $i }}" class="text-success">
                        Licencia Profesional #{{ $i + 1 }}
                    </span>
                    <a id="license" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Licencia Profesional" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_professional_license", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_professional_license[]", $professional_license->id, ["id" => "id_professional_license" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('type_professional_license_id', 'Tipo Licencia') }}
                    {{ Form::select('type_professional_license_id[]', $type_professional_licenses, $professional_license->type_professional_license_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('emission_license', 'Fecha de Emisión') }}
                    <div class="input-group date beforeCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('emission_license[]', $professional_license->emission_license->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('expired_license', 'Fecha de Vencimiento') }}
                    <div class="input-group date afterCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('expired_license[]', $professional_license->expired_license->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-offset-1 col-md-2">
                <div class="form-group">
                    {{ Form::label("is_donor" . $i, "Es donante?") }}
                    <ul class="list-unstyled list-inline">
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("is_donor" . $i, 1, ($professional_license->is_donor == 1) ? true : false) }}
                                {{ Form::label("is_donor" . $i, "Si", ['class' => 'control-label']) }}
                            </div>
                        </li>
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("is_donor" . $i, 0, ($professional_license->is_donor == 0) ? true : false) }}
                                {{ Form::label("is_donor" . $i, "No", ['class' => 'control-label']) }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label('detail_license', 'Detalle') }}
                    {{ Form::textarea('detail_license[]', $professional_license->detail_license, ['class'=> 'form-control', 'rows'=> 3]) }}
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach