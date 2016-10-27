<?php $i = 0; ?>
@foreach($employee->disabilities as $disability)

    <span id="disability{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_disability{{ $i }}" class="text-warning">
                        Discapacidad #{{ $i + 1 }}
                    </span>
                    <a id="disability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Discapacidad" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide form-group">
                {{ Form::label("id_disability", "ID", ["class" => "control-label"]) }}
                {{ Form::text("id_disability[]", $disability->id, ["id" => "id_disability" . $i, "class" => "form-control"]) }}
            </div>
            <div class="col-xs-6 col-sm-4 col-md-6 form-group">
                {{ Form::label("type_disability_id", "Discapacidad") }}
                {{ Form::select("type_disability_id[]", $type_disabilities, $disability->typeDisability->id, ["class"=> "form-control"]) }}
            </div>
            <div class="col-sm-offset-3 col-md-offset-2 col-xs-6 col-sm-4 col-md-4 form-group">
                {{ Form::label("treatment_disability", "Está en tratamiento?")}}
                <ul class="list-unstyled list-inline">
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disability" . $i, 1, ($disability->treatment_disability == 1) ? true : false) }}
                            {{ Form::label("treatment_disability" . $i, "Si", ['class' => 'control-label']) }}
                        </div>
                    </li>
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disability" . $i, 0, ($disability->treatment_disability == 0) ? true : false) }}
                            {{ Form::label("treatment_disability" . $i, "No", ['class' => 'control-label']) }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 form-group">
                {{ Form::label("detail_disability", "Detalle") }}
                {{ Form::textarea("detail_disability[]", $disability->detail_disability, ["class"=> "form-control", "rows"=> "3"]) }}
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach