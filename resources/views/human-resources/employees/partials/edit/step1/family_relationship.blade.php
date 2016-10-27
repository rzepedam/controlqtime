<?php $i = 0; ?>
@foreach($employee->familyRelationships as $family_relationship)

    <span id="family_relationship{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-warning alert-dismissible" role="alert">
                    <span id="num_family_relationship{{ $i }}" class="text-warning">
                        Parentesco Familiar #{{ $i + 1 }}
                    </span>
                    <a id="family_relationship" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Parentesco Familiar" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_family_relationship", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_family_relationship[]", $family_relationship->id, ["id" => "id_family_relationship" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {{ Form::label('relationship_id', 'Relación', ['class' => 'control-label']) }}
                    {{ Form::select('relationship_id[]', $relationships, $family_relationship->relationship_id, ['class'=> 'form-control']) }}
                </div>
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    {{ Form::label('employee_family_id', 'Nombre Familiar', ['class' => 'control-label'])}}
                    {{ Form::select('employee_family_id[]', $employees, $family_relationship->employee_family_id, ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach


