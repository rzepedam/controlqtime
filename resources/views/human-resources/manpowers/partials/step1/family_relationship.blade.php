<span id="family_relationship{{ $i }}">
	<div class="row">
        <div class="col-md-12">
			<span id="num_family_relationship{{ $i }}" class="text-warning titulo-seccion">
				Parentesco Familiar #{{ $i + 1 }}
			</span>
            <a id="family_relationship" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Parentesco"><i class="fa fa-trash"></i></a>
        </div>
    </div>
	<div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('relationship_id', 'Parentesco Familiar')}}
                {{Form::select('relationship_id[]', $relationships, Session::get('relationship_id')[$i], ['class'=> 'form-control', 'required'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('manpower_id', 'Nombre')}}
                {{Form::select('manpower_id[]', $manpowers, Session::get('manpower_id')[$i], ['class'=> 'form-control', 'required'])}}
            </div>
        </div>
    </div>
	<hr/>
</span>


