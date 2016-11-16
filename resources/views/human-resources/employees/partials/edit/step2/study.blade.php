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
            <div class="col-md-1 hide form-group">
                {{ Form::label("id_study", "ID", ["class" => "control-label"]) }}
                {{ Form::text("id_study[]", $study->id, ["id" => "id_study" . $i, "class" => "form-control"]) }}
            </div>
            <div class="col-sm-6 col-md-3 form-group">
                {{ Form::label('degree_id', 'Nivel de Estudio') }} <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="top" data-toggle="tooltip" data-original-title="No es posible editar el Nivel de Estudio en elementos existentes." data-html="true"></i>
                {{ Form::select('degree_id[]', $degrees, $study->degree_id, ['class'=> 'form-control select-disabled', 'onChange' => "this.options[" . ($study->degree_id - 1) . "].selected=true"]) }}
            </div>

            @if ($study->type_degree_id === 'school')
                <div class="col-sm-6 col-md-4 form-group hide">
                    {{ Form::label('name_study', 'Profesión u Oficio') }}
                    {{ Form::text('name_study[]', null, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
                </div>
                <div class="col-sm-6 col-md-4 form-group">
                    {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                    {{ Form::text("name_institution[]", $study->detailSchoolStudy->name_institution, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
                </div>
                <div class="col-sm-6 col-md-3 form-group hide">
                    {{ Form::label('institution_study_id', 'Institución', ['class'=> 'control-label']) }}
                    {{ Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control']) }}
                </div>
            @endif

            @if ($study->type_degree_id === 'technical')
                <div class="col-sm-6 col-md-4 form-group">
                    {{ Form::label('name_study', 'Profesión u Oficio') }}
                    {{ Form::text('name_study[]', $study->detailTechnicalStudy->name_study, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
                </div>
                <div class="col-sm-6 col-md-4 form-group">
                    {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                    {{ Form::text("name_institution[]", $study->detailTechnicalStudy->name_institution, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
                </div>
                <div class="col-sm-6 col-md-3 form-group hide">
                    {{ Form::label('institution_study_id', 'Institución', ['class'=> 'control-label']) }}
                    {{ Form::select('institution_study_id[]', $institutions, null, ['class'=> 'form-control']) }}
                </div>
            @endif

            @if ($study->type_degree_id === 'college')
                <div class="col-sm-6 col-md-4 form-group">
                    {{ Form::label('name_study', 'Profesión u Oficio') }}
                    {{ Form::text('name_study[]', $study->detailCollegeStudy->name_study, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '80']) }}
                </div>
                <div class="col-sm-6 col-md-4 form-group hide">
                    {{ Form::label("name_institution", "Institución", ["class"=> "control-label"]) }}
                    {{ Form::text("name_institution[]", null, ["class"=> "form-control maxlength", "data-plugin"=> "maxlength", "maxlength"=> "80"]) }}
                </div>
                <div class="col-sm-6 col-md-3 form-group">
                    {{ Form::label('institution_study_id', 'Institución') }}
                    {{ Form::select('institution_study_id[]', $institutions, $study->detailCollegeStudy->institution_study_id, ['class'=> 'form-control']) }}
                </div>
            @endif

            <div class="col-sm-6 col-md-2 form-group">
                {{ Form::label('date_obtention', 'Fecha Obtención') }}
                <div class="input-group date beforeCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('date_obtention[]', $study->date_obtention->format('d-m-Y'), ['class'=> 'form-control text-center', 'readonly']) }}
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach