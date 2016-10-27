<?php $i = 0; ?>
@foreach($employee->familyResponsabilities as $family_responsability)

    <span id="family_responsability{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                    <span id="num_family_responsability{{ $i }}" class="text-danger">
                        Carga Familiar #{{ $i + 1 }}
                    </span>
                    <a id="family_responsability" class="delete-elements pull-right tooltip-danger" data-toggle="tooltip" data-original-title="Eliminar Carga Familiar" data-html="true"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1 hide">
                <div class="form-group">
                    {{ Form::label("id_family_responsability", "ID", ["class" => "control-label"]) }}
                    {{ Form::text("id_family_responsability[]", $family_responsability->id, ["id" => "id_family_responsability" . $i, "class" => "form-control"]) }}
                </div>
            </div>
            <div class="col-sm-4 col-md-6 form-group">
                {{ Form::label('name_responsability', 'Nombre Completo') }}
                {{ Form::text('name_responsability[]', $family_responsability->name_responsability, ['class'=> 'form-control', 'data-plugin' => 'maxlength', 'maxlength' => '120']) }}
            </div>
            <div class="col-sm-4 col-md-3 form-group">
                {{ Form::label('rut_responsability', 'Rut') }} <i class="fa fa-info-circle text-primary tooltip-primary" data-toggle="tooltip" data-original-title="Ingrese rut sin puntos ni guión. <p class=\'text-center\'>Ej: 19317518k</p>" data-html="true"></i>
                {{ Form::text('rut_responsability[]', $family_responsability->rut_responsability, ['class'=> 'form-control check_rut']) }}
            </div>
            <div class="col-sm-4 col-md-3 form-group">
                {{ Form::label('relationship_id', 'Relación') }}
                {{ Form::select('relationship_id[]', $relationships, $family_responsability->relationship->id, ['class'=> 'form-control']) }}
            </div>
        </div>
        <br />
    </span>
    <?php $i++; ?>

@endforeach