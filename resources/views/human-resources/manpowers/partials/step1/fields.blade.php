<span id="family_relationship{{ $i }}">
    <div class="row">
        <div class="col-md-12">
            <span id="num_family_relationship{{ $i }}" class="title-elements text-light-blue">Parentesco Familiar #{{ $i + 1 }}</span><a id="family_relationship" class="delete-elements pull-right mitooltip" title="Eliminar Parentesco Familiar"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-md-6">
            {!! Form::label('family_relationship' . $i, 'Parentesco Familiar') !!}
            {!! Form::select('family_relationship' . $i, $kins, Session::get('family_relationship' . $i), ['class'=> 'form-control']) !!}
        </div>
        <div class="col-md-6">
            {!! Form::label('manpower' . $i, 'Nombre') !!}
            {!! Form::select('manpower' . $i, $manpowers, Session::get('manpower' . $i), ['class'=> 'form-control']) !!}
        </div>
    </div>
    <hr/>
</span>