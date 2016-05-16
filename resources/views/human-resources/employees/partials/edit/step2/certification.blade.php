<?php $i = 0; ?>
@foreach($manpower->certifications as $certification)

    <span id="certification{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                    <span id="num_certification{{ $i }}" class="text-danger">
                        Certificación #{{ $i + 1}}
                    </span>
                    <a id="certification" class="delete-elements pull-right mitooltip" title="Eliminar Certificación"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('type_certification_id', 'Certificación') }}
                    {{ Form::select('type_certification_id[]', $type_certifications, $certification->type_certification_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('expired_certification', 'Fecha de Vencimiento') }}
                    <div class="input-group date afterCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('expired_certification[]', $certification->expired_certification->format('d-m-Y'), ['class'=> 'form-control', 'required', 'readonly']) }}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('institution_certification_id', 'Institución') }}
                    {{ Form::select('institution_certification_id[]', $institutions, $certification->institution_certification_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach