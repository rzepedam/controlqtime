<span id="disability">
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                <span id="num_disability" class="text-warning titulo-seccion">
                    Discapacidad #{{ $i + 1 }}
                </span>
                <a id="disability" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label("type_disability_id", "Discapacidad") }}
                {{ Form::select("type_disability_id[]", $type_disabilities, null, ["class"=> "form-control", "required"]) }}
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="form-group">
                {{ Form::label("treatment_disability", "Está en tratamiento?")}}
                <ul class="list-unstyled list-inline">
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disability", "si", true) }}
                            {{ Form::label("treatment_disability", "Si") }}
                        </div>
                    </li>
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disability", "no", false) }}
                            {{ Form::label("treatment_disability", "No") }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label("detail_disability", "Detalle") }}
                {{ Form::textarea("detail_disability[]", null, ["class"=> "form-control", "rows"=> "3"]) }}
            </div>
        </div>
    </div>
    <hr/>
</span>