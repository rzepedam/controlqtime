<?php $i = 0; ?>
@foreach($manpower->familyResponsabilities as $family_responsability)

    <span id="family_responsability{{ $i }}">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-alt alert-danger alert-dismissible" role="alert">
                    <span id="num_family_responsability{{ $i }}" class="text-danger titulo-seccion">
                        Carga Familiar #{{ $i + 1 }}
                    </span>
                    <a id="family_responsability" class="delete-elements pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('name_responsability', 'Nombre Completo') }}
                    {{ Form::text('name_responsability[]', $family_responsability->name_responsability, ['class'=> 'form-control', 'required']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('rut_responsability', 'Rut') }}
                    {{ Form::text('rut_responsability[]', $family_responsability->rut_responsability, ['class'=> 'form-control check_rut', 'required']) }}
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    {{ Form::label('relationship_id', 'Relación') }}
                    {{ Form::select('relationship_id[]', $relationships, $family_responsability->relationship_id, ['class'=> 'form-control']) }}
                </div>
            </div>
        </div>
        <br/>
    </span>
    <?php $i++; ?>

@endforeach