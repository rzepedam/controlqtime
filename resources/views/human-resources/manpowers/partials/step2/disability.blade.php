<span id="disability {{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <span id="num_disability {{ $i }}" class="title-elements text-primary">Discapacidad #{{ $i + 1 }}</span><a id="disability" class="delete-elements pull-right mitooltip" title="Eliminar Discapacidad"><i class="fa fa-trash"></i></a>
        </div>
    </div>
	<br />
	<div class="row">
        <div class="col-md-6">
            {!! Form::label("disability" . $i, "Nombre") !!}
            {!! Form::select("disability" . $i, $disabilities, Session::get('disability' . $i), ["class"=> "form-control"]) !!}
        </div>

        <div class="col-md-6 text-center">
            {!! Form::label("treatment_disability" . $i, "Está en tratamiento?") !!}<br />
            {!! Form::label("si", "Si") !!}&nbsp&nbsp
            {!! Form::radio("treatment_disability" . $i, "si", (Session::get('treatment_disability' . $i) == 'si') ? true : false, ['class'=> 'treatment_disability']) !!}&nbsp&nbsp
            {!! Form::label("no", "No") !!}&nbsp&nbsp
            {!! Form::radio("treatment_disability" . $i, "no", (Session::get('treatment_disability' . $i) == 'no') ? true : false) !!}

        </div>
    </div>
	<br/>
	<div class="row">
        <div class="col-md-12">
            {!! Form::label("detail_disability" . $i, "Detalle") !!}
            {!! Form::textarea("detail_disability" . $i, Session::get('detail_disability' . $i), ["class"=> "form-control", "rows"=> "3"]) !!}
        </div>
    </div>
	<br/>
	<div id="img_disability{{ $i }}" class="dropzone">
        <div class="dz-message">
            <h3 class="text-primary">Arrastre sus archivos hasta aquí</h3>
            <span class="note">(También puede hacer click y seleccionarlos manualmente)</span>
        </div>
    </div>
	<hr />
</span>