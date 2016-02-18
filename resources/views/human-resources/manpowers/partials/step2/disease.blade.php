<span id="disease{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <span id="num_disease{{ $i }}" class="title-elements text-success">Enfermedad #{{ ($i + 1) }}</span><a id="disease" class="delete-elements pull-right mitooltip" title="Eliminar Enfermedad"><i class="fa fa-trash"></i></a>
        </div>
    </div>
	<br />
	<div class="row">
        <div class="col-md-6">
            {!! Form::label("disease" . $i, "Nombre") !!}
            {!! Form::select("disease" . $i, $diseases, Session::get('disease' . $i), ["class"=> "form-control"]) !!}
        </div>
        <div class="col-md-6 text-center">
            {!! Form::label("treatment_disease" . $i, "Está en tratamiento?") !!}<br/>
            {!! Form::label("si", "Si") !!}&nbsp&nbsp
            {!! Form::radio("treatment_disease" . $i, "si", (Session::get('treatment_disease' . $i) == 'si') ? true : false) !!}&nbsp&nbsp
            {!! Form::label("no", "No") !!}&nbsp&nbsp
            {!! Form::radio("treatment_disease" . $i, "no", (Session::get('treatment_disease' . $i) == 'no') ? true : false, ['class'=> 'treatment_disease']) !!}
        </div>
    </div>
	<br/>
	<div class="row">
        <div class="col-md-12">
            {!! Form::label("detail_disease" . $i, "Detalle") !!}
            {!! Form::textarea("detail_disease" . $i, Session::get('detail_disease' . $i), ["class"=> "form-control", "rows"=> "3"]) !!}
        </div>
    </div>
	<br/>
	<div id="img_disease{{ $i }}" class="dropzone">
        <div class="dz-message">
            <h3 class="text-green">Arrastre sus archivos hasta aquí</h3>
            <span class="note">(También puede hacer click y seleccionarlos manualmente)</span>
        </div>
    </div>
	<hr />
</span>