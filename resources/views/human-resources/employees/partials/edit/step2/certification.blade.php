<?php $i = 0; ?>
@foreach($employee->certifications as $certification)

    <span id="certification{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                    <span id="num_certification{{ $i }}" class="text-danger">
                        Certificación #{{ $i + 1}}
                    </span>
                    <a id="certification" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Certificación" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_certification", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_certification[]", $certification->id, ["id" => "id_certification" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-group">
                    {{ Form::label('type_certification_id', 'Certificación') }}
                    {{ Form::select('type_certification_id[]', $type_certifications, $certification->type_certification_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="form-group">
                    {{ Form::label('institution_certification_id', 'Institución') }}
                    {{ Form::select('institution_certification_id[]', $institutions, $certification->institution_certification_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <div class="form-group">
                    {{ Form::label('emission_certification', 'Fecha Emisión') }}
                    <div class="input-group date beforeCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('emission_certification[]', $certification->emission_certification->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <div class="form-group">
                    {{ Form::label('expired_certification', 'Fecha Expiración') }}
                    <div class="input-group date afterCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('expired_certification[]', $certification->expired_certification->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach