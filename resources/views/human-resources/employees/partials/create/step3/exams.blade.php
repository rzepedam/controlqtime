<span id="exam">
    <div class="row">
        <div class="col-md-12">
            <span id="num_exam" class="text-info titulo-seccion">
                Examen Preocupacional #' + (count_exams + 1) + '
            </span>
            <a id="exam" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Examen"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                {{ Form::label('exam_id', 'Examen') }}
                {{ Form::select('exam_id', $exams, null, ['class'=> 'form-control', 'required']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('expired_exam', 'Fecha de Vencimiento') }}
                <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    {{ Form::text('expired_exam[]', null, ['class'=> 'form-control', 'required', 'readonly']) }}
                </div>
            </div>
        </div>
    </div>
    <hr/>
</span>