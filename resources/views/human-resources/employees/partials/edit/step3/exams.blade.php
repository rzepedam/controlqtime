<?php $i = 0; ?>
@foreach($employee->exams as $exam)

    <span id="exam{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                    <span id="num_exam{{ $i }}" class="text-info">
                        Examen Preocupacional #{{ $i + 1 }}
                    </span>
                    <a id="exam" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Examen Preocupacional" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_exam", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_exam[]", $exam->id, ["id" => "id_exam" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-sm-4 col-md-4 form-group">
                {{ Form::label('type_exam_id', 'Examen') }}
                {{ Form::select('type_exam_id[]', $type_exams, $exam->typeExam->id, ['class'=> 'form-control']) }}
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 form-group">
                {{ Form::label('emission_exam', 'Fecha Emisión') }}
                <div class="input-group date beforeCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('emission_exam[]', $exam->emission_exam->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-2 form-group">
                {{ Form::label('expired_exam', 'Fecha Expiración') }}
                <div class="input-group date afterCurrentDate">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_exam[]', $exam->expired_exam->format('d-m-Y'), ['class'=> 'form-control', 'readonly']) }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 form-group">
                {{ Form::label("detail_exam", "Detalle") }}
                {{ Form::textarea("detail_exam[]", $exam->detail_exam, ["class"=> "form-control", "rows"=> "3"]) }}
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach