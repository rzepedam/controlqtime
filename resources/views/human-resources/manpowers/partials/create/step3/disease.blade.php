<span id="disease">
    <div class="row">
        <div class="col-md-12">
            <span id="num_disease" class="text-success titulo-seccion">
                Enfermedad #' + (count_diseases + 1) + '
            </span>
            <a id="disease" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label("disease_id", "Nombre") }}
                {{ Form::select("disease_id[]", $diseases, null, ["class"=> "form-control", "required"]) }}
            </div>
        </div>
        <div class="col-md-6 text-center">
            <div class="form-group">
                {{ Form::label("treatment_disease", "Está en tratamiento?")}}
                <ul class="list-unstyled list-inline">
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disease", "si", true) }}
                            {{ Form::label("treatment_disease", "Si") }}
                        </div>
                    </li>
                    <li>
                        <div class="radio-custom radio-primary">
                            {{ Form::radio("treatment_disease", "no", false) }}
                            {{ Form::label("treatment_disease", "No") }}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                {{ Form::label("detail_disease", "Detalle") }}
                {{ Form::textarea("detail_disease[]", null, ["class"=> "form-control", "rows"=> "3"]) }}
            </div>
        </div>
    </div>
    <hr/>
</span>