<?php $i = 0; ?>
@foreach($employee->diseases as $disease)

    <span id="disease{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                    <span id="num_disease{{ $i }}" class="text-success">
                        Enfermedad #{{ $i + 1 }}
                    </span>
                    <a id="disease" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Enfermedad" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_disease", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_disease[]", $disease->id, ["id" => "id_disease" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("type_disease_id", "Nombre") }}
                    {{ Form::select("type_disease_id[]", $type_diseases, $disease->typeDisease->id, ["class"=> "form-control"]) }}
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="form-group">
                    {{ Form::label("treatment_disease", "Está en tratamiento?")}}
                    <ul class="list-unstyled list-inline">
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("treatment_disease" . $i, 1, ($disease->treatment_disease == 1) ? true : false) }}
                                {{ Form::label("treatment_disease" . $i, "Si", ['class' => 'control-label']) }}
                            </div>
                        </li>
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("treatment_disease" . $i, 0, ($disease->treatment_disease == 0) ? true : false) }}
                                {{ Form::label("treatment_disease" . $i, "No", ['class' => 'control-label']) }}
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    {{ Form::label("detail_disease", "Detalle") }}
                    {{ Form::textarea("detail_disease[]", $disease->detail_disease, ["class"=> "form-control", "rows"=> "3"]) }}
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach