<?php $i = 0; ?>
@foreach($manpower->studies as $study)

    <span id="study{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                    <span id="num_study{{ $i }}" class="text-info titulo-seccion">
                        Estudio Académico #{{ $i + 1 }}
                    </span>
                    <a id="study" class="delete-elements pull-right mitooltip" title="Eliminar Estudio"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('degree_id', 'Grado Académico') }}
                    {{ Form::select('degree_id[]', $degrees, $study->degree_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    {{ Form::label('name_study', 'Nombre') }}
                    {{ Form::text('name_study[]', $study->name_study, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('institution_study_id', 'Institución') }}
                    {{ Form::select('institution_study_id[]', $institutions, $study->institution_study_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    {{ Form::label('date', 'Fecha Obtención') }}
                    <div class="input-group date beforeCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('date[]', $study->date->format('d-m-Y'), ['class'=> 'form-control', 'required', 'readonly']) }}
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach