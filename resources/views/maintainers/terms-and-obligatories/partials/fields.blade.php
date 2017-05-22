<div class="row">
    <div class="col-md-12">
        <div class="pull-right">
            <label for="act">Predeterminar</label> <i class="fa fa-info-circle tooltip-primary text-primary" data-placement="top" data-toggle="tooltip" data-original-title="Determina si la cláusula será activada por defecto en la creación de un Contrato"></i>
            @if (Route::is('terms-and-obligatories.create'))
                <input type="checkbox" name="default" id="default" data-color="#3949AB" />
            @else
                <input type="checkbox" name="default" id="default" data-color="#3949AB" {{ $termAndObligatory->default ? 'checked' : null }} />
            @endif
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
