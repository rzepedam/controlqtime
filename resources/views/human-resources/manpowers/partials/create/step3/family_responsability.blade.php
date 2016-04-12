<span id="family_responsability">
    <div class="row">
        <div class="col-md-12">
            <span id="num_family_responsability" class="text-danger titulo-seccion">
                Carga Familiar #' + (count_family_responsabilities + 1) + '
            </span>
            <a id="family_responsability" class="icono-eliminar-elementos pull-right mitooltip" title="Eliminar Carga Familiar"><i class="fa fa-trash"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{ Form::label('name_responsability', 'Nombre Completo') }}
                {{ Form::text('name_responsability[]', null, ['class'=> 'form-control', 'required']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('rut_responsability', 'Rut') }}
                {{ Form::text('rut_responsability[]', null, ['class'=> 'form-control check_rut', 'required']) }}
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                {{ Form::label('relationship_id', 'Relación') }}
                {{ Form::select('relationship_id[]', $relationships, null, ['class'=> 'form-control']) }}
            </div>
        </div>
    </div>
    <hr/>
</span>