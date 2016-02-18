<span id="family_responsability{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <span id="num_family_responsability{{ $i }}" class="title-elements text-yellow">Carga Familiar #{{ ($i + 1) }}</span><a id="family_responsability" class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a>
        </div>
    </div>
	<br />
	<div class="row">
        <div class="col-md-6">
            {!! Form::label('name_responsability' . $i, 'Nombre Completo') !!}
            {!! Form::text('name_responsability' . $i, Session::get('name_responsability' . $i), ['class'=> 'form-control']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('rut' . $i, 'Rut') !!}
            {!! Form::text('rut' . $i, Session::get('rut' . $i), ['class'=> 'form-control']) !!}
        </div>
        <div class="col-md-3">
            {!! Form::label('kin_id' . $i, 'Parentesco') !!}
            {!! Form::select('kin_id' . $i, $kins, Session::get('kin_id' . $i), ['class'=> 'form-control']) !!}
        </div>
    </div>
	<hr />
</span>