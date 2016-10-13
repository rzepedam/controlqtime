<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <label for="act">Predeterminar</label> <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="top" data-toggle="tooltip" data-original-title="Determina si la cláusula será activada por defecto en la creación de un Contrato"></i>
            <input type="checkbox" name="act" id="act" data-plugin="switchery" data-color="#3949AB" {{ (Route::is('terms-and-obligatories.create')) ? null : $termAndObligatory->act }} />
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        {{-- Nombre Form Input --}}
        <div class="form-group">
            {{ Form::label('name', 'Nombre', ['class' => 'control-label']) }}
            {{ Form::textarea('name', null, ['class' => 'form-control', 'rows' => 5, 'autofocus']) }}
        </div>
    </div>
</div>
