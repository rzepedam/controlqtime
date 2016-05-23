<?php $i = 0; ?>
@foreach($employee->specialities as $speciality)

    <span id="speciality{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_speciality{{ $i }}" class="text-warning">
                        Especialidad #{{ $i + 1 }}
                    </span>
                    <a id="speciality" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Especialidad" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_speciality", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_speciality[]", $speciality->id, ["id" => "id_speciality" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('type_speciality_id', 'Especialidad') }}
                    {{ Form::select('type_speciality_id[]', $type_specialities, $speciality->type_speciality_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('institution_speciality_id', 'Institución') }}
                    {{ Form::select('institution_speciality_id[]', $institutions, $speciality->institution_speciality_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('emission_speciality', 'Fecha de Emisión') }}
                    <div class="input-group date beforeCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('emission_speciality[]', $speciality->emission_speciality->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('expired_speciality', 'Fecha de Vencimiento') }}
                    <div class="input-group date afterCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('expired_speciality[]', $speciality->expired_speciality->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach