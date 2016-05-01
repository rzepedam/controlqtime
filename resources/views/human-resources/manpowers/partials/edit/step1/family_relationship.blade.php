<span id="family_relationship{{ $i }}">
	<div class="row">
        <div class="col-md-12">
            <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
			    <span id="num_family_relationship{{ $i }}" class="text-warning">
				    Parentesco Familiar #{{ $i + 1 }}
			    </span>
                <a id="family_relationship" class="delete-elements pull-right mitooltip" title="Eliminar Parentesco"><i class="fa fa-trash"></i></a>
            </div>
        </div>
    </div>
	<div class="row">
        <div class="col-md-1 hide">
            {{ Form::label('id_family_relationship' . $i, 'ID', ['class' => 'control-label']) }}
            {{ Form::text('id_family_relationship' . $i, $family_relationship->id, ['class' => 'form-control']) }}
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('relationship_id' . $i, 'Relación', ['class' => 'control-label']) }}
                {{ Form::select('relationship_id' . $i, $relationships, $family_relationship->relationship_id, ['class'=> 'form-control']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('manpower_family_id' . $i, 'Nombre Familiar', ['class' => 'control-label'])}}
                {{ Form::select('manpower_family_id' . $i, $manpowers, $family_relationship->manpower_family_id, ['class'=> 'form-control']) }}
            </div>
        </div>
    </div>
	<br />
</span>
<?php $i++; ?>







