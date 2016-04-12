<?php $i = 0; ?>
@foreach($manpower->exams as $exam)

    <span id="exam{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-info alert-dismissible" role="alert">
                    <span id="num_exam{{ $i }}" class="text-info titulo-seccion">
                        Examen Preocupacional #{{ $i + 1 }}
                    </span>
                    <a id="exam" class="delete-elements pull-right mitooltip" title="Eliminar Examen"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    {{ Form::label('exam_id', 'Examen') }}
                    {{ Form::select('exam_id[]', $type_exams, $exam->type_exam_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('expired_exam', 'Fecha de Vencimiento') }}
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        {{ Form::text('expired_exam[]', $exam->expired_exam->format('d-m-Y'), ['class'=> 'form-control', 'required', 'readonly']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label("detail_exam", "Detalle") }}
                    {{ Form::textarea("detail_exam[]", $exam->detail_exam, ["class"=> "form-control", "rows"=> "3"]) }}
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach
