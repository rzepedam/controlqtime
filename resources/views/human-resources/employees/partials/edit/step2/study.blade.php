<?php $i = 0; ?>
@foreach($employee->studies as $study)

    <span id="study{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                    <span id="num_study{{ $i }}" class="text-info titulo-seccion">
                        Estudio Académico #{{ $i + 1 }}
                    </span>
                    <a id="study" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Estudio Académico" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_study", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_study[]", $study->id, ["id" => "id_study" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="form-group">
                    {{ Form::label('degree_id', 'Nivel de Estudio') }}
                    {{ Form::select('degree_id[]', $degrees, $study->degree_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-8 col-md-4">
                <div class="form-group">
                    {{ Form::label('name_study', 'Profesión u Oficio') }}
                    {{ Form::text('name_study[]', $study->name_study, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="form-group">
                    {{ Form::label('institution_study_id', 'Institución') }}
                    {{ Form::select('institution_study_id[]', $institutions, $study->institution_study_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-3 col-md-2">
                <div class="form-group">
                    {{ Form::label('date_obtention', 'Fecha Obtención') }}
                    <div class="input-group date beforeCurrentDate">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('date_obtention[]', $study->date_obtention->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach