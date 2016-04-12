<?php $i = 0; ?>
@foreach($manpower->diseases as $disease)

    <span id="disease{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-success alert-dismissible" role="alert">
                    <span id="num_disease{{ $i }}" class="text-success titulo-seccion">
                        Enfermedad #{{ $i + 1 }}
                    </span>
                    <a id="disease" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label("disease_id", "Nombre") }}
                    {{ Form::select("disease_id[]", $type_diseases, $disease->type_disease_id, ["class"=> "form-control", "required"]) }}
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="form-group">
                    {{ Form::label("treatment_disease", "Está en tratamiento?")}}
                    <ul class="list-unstyled list-inline">
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("treatment_disease" . $i, 1, ($disease->treatment_disease) ? true : false) }}
                                {{ Form::label("treatment_disease" . $i, "Si") }}
                            </div>
                        </li>
                        <li>
                            <div class="radio-custom radio-primary">
                                {{ Form::radio("treatment_disease" . $i, 0, ($disease->treatment_disease) ? false : true) }}
                                {{ Form::label("treatment_disease" . $i, "No") }}
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