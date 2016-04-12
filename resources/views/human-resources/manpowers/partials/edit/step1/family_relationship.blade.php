<?php $i = 0; ?>
@foreach($manpower->familyRelationships as $family_relationship)

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
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('relationship_id', 'Parentesco Familiar') }}
                    {{ Form::select('relationship_id[]', $relationships, $family_relationship->relationship_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('manpower_family_id', 'Nombre') }}
                    {{ Form::select('manpower_family_id[]', $manpowers, $family_relationship->manpower_family_id, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach

